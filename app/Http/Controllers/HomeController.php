<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Items;
use App\Models\Product;
use App\Models\Productcategory;
use App\Models\Purchase;
use App\Models\PurchaseProduct;
use App\Models\QuantityType;
use App\Models\Sale;
use App\Models\Saleproduct;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function getItem($id)
    {
        $prd =  Items::where('id', $id)->first();
        return json_encode(array('item' => $prd->id, 'salesPrice' => $prd->price, 'qty' => $prd->quantity, 'taxs'=>$prd->taxrate,'img'=>$prd->file_path));
    }


    public function getProducts($id)
    {
        $prd =  Product::where('create_by', $id)->get();
        $products = "<option value=>Please Select</option>";
        foreach ($prd as $row) {
            $products .= "<option value=" . $row->id . ">" . $row->productname . "</option>";
        }

        $productsCode = "<option value=>Please Select</option>";
        foreach ($prd as $row) {
            $productsCode .= "<option value=" . $row->productitemcode . ">" . $row->productitemcode . "</option>";
        }

        $lastId = Purchase::where('create_by', $id)->count();
        $branch = User::where('id', $id)->first();
        $yr = date('m') . date('y');
        $number = 'B' . $branch->branch . 'P_' . $yr . '_' . str_pad($lastId + 1, 5, 0, STR_PAD_LEFT);
        return json_encode(array('product' => $products, 'productsCode' => $productsCode, 'number' => $number));
    }
    public function getProduct($id)
    {
        $prd =  Product::where('create_by', $id)->get();
        $products = "<option value=>Please Select</option>";
        foreach ($prd as $row) {
            $products .= "<option value=" . $row->id . ">" . $row->productname . "</option>";
        }
        $lastId = Sale::where('create_by', $id)->count();
        $branch = User::where('id', $id)->first();
        $yr = date('m') . date('y');
        $number = 'B' . $branch->branch . 'S_' . $yr . '_' . str_pad($lastId + 1, 5, 0, STR_PAD_LEFT);
        return json_encode(array('product' => $products, 'number' => $number));
    }
    public function index(Request $request)
    {
        $productCount = Items::count();
        // $data['PurchaseCount'] = Purchase::count();
        $SaleCount = Sale::count();
        $userId = $userId = $request->get('user') ? $request->get('user') : 0;

        if (Auth::user()->usertype == 1) {
            if ($userId != 0)
                $whr['sales.create_by'] = $userId;
            else
                $whr = [];
        } else
            $whr = array('sales.create_by' => Auth::user()->id);

        $users= User::where('usertype', 2)->get();
      
        //saletable
        $sale = Sale::select('sales.*', 'users.name')->join('users', 'users.id', 'sales.create_by')->orderBy('sales.id')
            ->where($whr)
            ->where('sales.status', 0)
            ->get();

        $cnt = Sale::join('users', 'users.id', 'sales.create_by')->orderBy('sales.id')
            ->where($whr)
            ->where('sales.status', 0)
            ->count();

        if ($cnt % 10 == 0) {
            $count = $cnt / 10;
        } else {
            $a = $cnt % 10;
            $b = $cnt - $a;
            $count = ($b / 10) + 1;
        }
        $from = $fromDate = $request->get('fromDate') ? $request->get('fromDate') : date('2022/01/01');
        $to = $toDate = $request->get('toDate') ? $request->get('toDate') : date('Y/m/d');
        $data = array();
        foreach ($sale as $row) {
            $row['product'] = Saleproduct::join('items', 'items.id', 'saleproducts.productName')->where('saleid', $row->id)->get();
            array_push($data, $row);
        }
        return view('home',compact('data', 'userId', 'users', 'count','from','to','productCount','SaleCount'));
    }
    
    public function addsale()
    {

        $data['item'] = Items::orderBy('id')->get();
        $data['items'] = Items::get();
        // $data['product'] = Product::orderBy('id')->get();
        if (Auth::user()->usertype != 1) {
            $data['product'] = Product::where('create_by', Auth::user()->id)->orderBy('id')->get();
            $lastId = Sale::where('create_by', Auth::user()->id)->count();
            $branch = Auth::user()->branch;
            $yr = date('m') . date('y');
            $data['number'] = 'B' . $branch . 'S_' . $yr . '_' . str_pad($lastId + 1, 5, 0, STR_PAD_LEFT);
        } else {
            $lastId = Items::count();
           
            $yr = date('m') . date('y');
            $data['number'] = 'P_' . $yr . '_' . str_pad($lastId + 1, 5, 0, STR_PAD_LEFT);
            $data['users'] = User::where('usertype', 2)->get();
        }
        return view('addsale', $data);
    }
    public function addsaleStore(Request $request)
    {
        $request->validate([
            'date' => ['required'],
            'number' => ['required', 'string'],
            'suppliername' => ['required', 'string'],
            'productName' => ['required'],
            'quantities' => ['required'],

        ]);
        if (Auth::user()->usertype == 1)
            $create_by = $request->user;
        else
            $create_by = Auth::user()->id;


        $db = new Sale();
        $db->date = $request->date;
        $db->number = $request->number;
        $db->suppliername = $request->suppliername;
        $db->create_by = $create_by;
        $db->save();
        $db->id;
        foreach ($request->productName as $key => $productName) {
            if ($productName != '') {
                $sale = new Saleproduct();
                $sale->productName = $productName;
                $sale->saleid = $db->id;
                $sale->quantities = $request->quantities[$key];
                $sale->price_id = $request->price_id[$key];
                $sale->tax_id = $request->tax_id[$key];
                $sale->create_by = Auth::user()->id;
                $sale->save();
                $model = Stock::where('prodctid', $productName)->first();
                $model->decrement('stock_count', $request->quantities[$key]);
                $model->save();
            }
        }


        return redirect('salelist')->with('message', 'Sale Added Successfully');
    }



    public function salelist(Request $request)
    {
        $userId = $userId = $request->get('user') ? $request->get('user') : 0;

        if (Auth::user()->usertype == 1) {
            if ($userId != 0)
                $whr['create_by'] = $userId;
            else
                $whr = [];
        } else
            $whr = array('sales.create_by' => Auth::user()->id);

        $users = User::where('usertype', 2)->get();



     
        $sale = Sale::select('sales.*', 'users.name')->join('users', 'users.id', 'sales.create_by')->orderBy('sales.id')
            ->where($whr)
            ->where('sales.status', 0)
            ->get();

        $cnt = Sale::join('users', 'users.id', 'sales.create_by')->orderBy('sales.id')
            ->where($whr)
            ->where('sales.status', 0)
            ->count();

        if ($cnt % 10 == 0) {
            $count = $cnt / 10;
        } else {
            $a = $cnt % 10;
            $b = $cnt - $a;
            $count = ($b / 10) + 1;
        }
        $from = $fromDate = $request->get('fromDate') ? $request->get('fromDate') : date('2022/01/01');
        $to = $toDate = $request->get('toDate') ? $request->get('toDate') : date('Y/m/d');
        $data = array();
        foreach ($sale as $row) {
            $row['product'] = Saleproduct::join('items', 'items.id', 'saleproducts.productName')->where('saleid', $row->id)->get();
            array_push($data, $row);
        }

        return view('salelist', compact('data', 'userId', 'users', 'count','from','to'));
    }
    //sale edit
    public function saleedit($id)
    {
        $data['sale'] = $sa =  Sale::where('id', $id)
            ->first();
        $data['product'] = Product::where('create_by', $sa->create_by)->orderBy('id')->get();
        $data['saleproduct'] = Saleproduct::where('saleid', $id)->get();
        $data['items']=Items::orderBy('id')->get();
        if (Auth::user()->usertype == 1) {
            $data['users'] = User::where('usertype', 2)->get();
        }
        return view('saleedit', $data);
    }
    // saleedit
    public function saleUpdate(Request $request, $id)
    {
        $request->validate([
            'date' => ['required'],
            'number' => ['required'],
            'suppliername' => ['required', 'string'],
        ]);
        $db = Sale::find($id);
        $db->date = $request->date;
        $db->number = $request->number;
        $db->suppliername = $request->suppliername;
        $db->save();
        $d =  Saleproduct::where('saleid', $id)->get();
        foreach ($d as $r) {
            $model = Stock::where('prodctid', $r->productName)->first();
            $model->increment('stock_count', $r->quantities);
            $model->save();
        }
        Saleproduct::where('saleid', $id)->delete();

        foreach ($request->productName as $key => $productName) {
            if ($productName != '') {
                $sale = new Saleproduct();
                $sale->productName = $productName;
                $sale->saleid = $db->id;
                $sale->quantities = $request->quantities[$key];
                $sale->price_id = $request->price_id[$key];
                $sale->tax_id = $request->tax_id[$key];
                $sale->create_by = Auth::user()->id;
                $sale->save();
                $model = Stock::where('prodctid', $productName)->first();
                $model->decrement('stock_count', $request->quantities[$key]);
                $model->save();
            }
        }
        return redirect('salelist')->with('message', 'Sale Update Successfully');
    }
    public function saledestroy(Sale $sale, $id)
    {

        Sale::where('id', $id)->update([
            'sales.status' => 1
        ]);
        $d =  Saleproduct::where('saleid', $id)->get();
        foreach ($d as $r) {
            $model = Stock::where('prodctid', $r->productName)->first();
            $model->increment('stock_count', $r->quantities);
            $model->save();
        }
       
        return redirect()->back()
            ->with('message', 'Sale has been deleted successfully');
    }

    public function stock_count($id)
    {
        return  Stock::where('prodctid', $id)->pluck('stock_count');
    }
    
    public function salereport(Request $request)
    {
        $userId = $userId = $request->get('user') ? $request->get('user') : 0;

        if (Auth::user()->usertype == 1) {
            if ($userId != 0)
                $whr['create_by'] = $userId;
            else
                $whr = [];
        } else
            $whr = array('sales.create_by' => Auth::user()->id);

        $users = User::where('usertype', 2)->get();
        // $purchase = Purchase::select('purchases.*', 'users.name')->join('users', 'users.id', 'purchases.create_by')->orderBy('purchases.id')
        $sale = Sale::select('sales.*', 'users.name')->join('users', 'users.id', 'sales.create_by')->orderBy('sales.id')
            ->where($whr)
            ->where('status', 0)
            ->get();

        $cnt = Sale::join('users', 'users.id', 'sales.create_by')->orderBy('sales.id')
            ->where($whr)
            ->where('status', 0)
            ->count();

        if ($cnt % 10 == 0) {
            $count = $cnt / 10;
        } else {
            $a = $cnt % 10;
            $b = $cnt - $a;
            $count = ($b / 10) + 1;
        }

        $from = $fromDate = $request->get('fromDate') ? $request->get('fromDate') : date('2022/01/01');
        $to = $toDate = $request->get('toDate') ? $request->get('toDate') : date('Y/m/d');
        $data = array();
        foreach ($sale as $row) {
            $row['product'] = Saleproduct::join('items', 'items.id', 'saleproducts.productName')->where('saleid', $row->id)->get();
            array_push($data, $row);
        }
        return view('salereport', compact('data', 'userId', 'users', 'count','from','to'));
    }
   
    public function Additem()
    {
        $lastId = Items::count();
        $yr = date('m') . date('y');
        $data['number'] = 'P_' . $yr . '_' . str_pad($lastId + 1, 5, 0, STR_PAD_LEFT);
        $data['qtytype']=QuantityType::get();
        return view('Additem',$data);
    }
    public function itemStore(Request $request)
    {
        $db = new Items();
        $db->quantitytype = $request->quantitytype;
        $db->itemname = $request->itemname;
        $db->itemcode = $request->itemcode;
        $db->quantity = $request->quantity;
        $db->price = $request->price;
        $db->taxrate = $request->taxrate;
        if ($request->file()) {
            $fileName = time() . rand(0, 1000) . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path() . '/uploads', $fileName);
            $db->file = $fileName;
            $db->file_path = '/uploads/' . $fileName;
        }
     
        $db->save();
        // $db->id;
        // $stock = new Stock();
        // $stock->stock_count = $request->quantity;
        // $stock->prodctid = $db->id;
        // $stock->create_by = Auth::user()->id;
        // $stock->save();
        return back()->with('message', 'Product  Added Successfully');
    }
    public function Itemlist(Request $request)
    {
        $data['items'] = Items::select('items.*', 'quantity_types.quantityTypes')
        ->join('quantity_types', 'items.quantitytype', '=', 'quantity_types.id')
        ->orderBy('items.id')
        ->where('items.status', 0)
        ->get();
        return view('Itemlist', $data);
    }
    public function Itemedit($id)
    {
        $data['qtytype']=QuantityType::get();
       $data['item']=Items::where('id', $id)
       ->first();
        return view('Itemedit', $data);
    }
    public function ItemUpdate(Request $request, $id)
    {
        $db = Items::find($id);
        $db->quantitytype = $request->quantitytype;
        $db->itemname = $request->itemname;
        $db->itemcode = $request->itemcode;
        $db->quantity = $request->quantity;
        $db->price = $request->price;
        $db->taxrate = $request->taxrate;
        if ($request->file()) {
            $fileName = time() . rand(0, 1000) . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path() . '/uploads', $fileName);
            $db->file = $fileName;
            $db->file_path = '/uploads/' . $fileName;
        }
        $db->totalamount=$request->totalamount;
        $db->save();
        return redirect('Itemlist')->with('message', 'Update Successfully');
    }
    public function ItemDestroy(Items $categorys, $id)
    {
        Items::where('id', $id)->update([
            'status' => 1
        ]);
        return redirect('Itemlist')
            ->with('message', 'Deleted successfully');
    }

    //qty add
    public function Addquantitytype()
    {
        return view('Addquantitytype');
    }

    public function QuantitytypeStore(Request $request)
    {
        $db = new QuantityType();
        $db->quantityTypes = $request->quantityTypes;
        $db->save();
        return back()->with('message', 'Product  Added Successfully');
    }
    public function Quantitytypelist(Request $request)
    {
       $data['qtytype']=QuantityType::get();
        return view('Quantitytypelist', $data);
    }
    public function Quantitytypeedit($id)
    {
       $data['qtytype']=QuantityType::where('id', $id)
       ->first();
        return view('Quantitytypeedit', $data);
    }
    public function QuantitytypeUpdate(Request $request, $id)
    {
        $db = QuantityType::find($id);
        $db->quantityTypes = $request->quantityTypes;
        $db->save();
        return redirect('Quantitytypelist')->with('message', 'Update Successfully');
    }
   
    public function demo()
    {
        $data['item'] = Items::orderBy('id')->get();
        $data['items'] = Items::where('items.status', 0)
        ->get();
        // $data['product'] = Product::orderBy('id')->get();
        if (Auth::user()->usertype != 1) {
            $data['product'] = Product::where('create_by', Auth::user()->id)->orderBy('id')->get();
            $lastId = Sale::where('create_by', Auth::user()->id)->count();
            $branch = Auth::user()->branch;
            $yr = date('m') . date('y');
            $data['number'] = 'B' . $branch . 'S_' . $yr . '_' . str_pad($lastId + 1, 5, 0, STR_PAD_LEFT);
        } else {
            $lastId = Purchase::where('create_by', Auth::user()->id)->count();
            $branch = Auth::user()->branch;
            $yr = date('m') . date('y');
            $data['number'] = 'B' . $branch . 'P_' . $yr . '_' . str_pad($lastId + 1, 5, 0, STR_PAD_LEFT);
            $data['users'] = User::where('usertype', 2)->get();
        }
      
        return view('demo',$data);
    }

}
