<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh sách khách hàng';
        $limit = 10;

        if (isset($_GET['from']) && isset($_GET['to']))
        {
            $currYear = date('Y');
            $min      = $currYear - $_GET['to'];
            $max      = $currYear - $_GET['from'];

            $customers = DB::table('customers')->whereBetween(DB::raw('YEAR(birthday)'), [$min, $max])->orderBy('id', 'desc')->simplePaginate($limit);
        }
        elseif (isset($_GET['search']))
        {
            $customers = DB::table('customers')->where('name', 'like', "%{$_GET['search']}%")->orwhere('phone', 'like', "%{$_GET['search']}%")->orderBy('id', 'desc')->simplePaginate($limit);
        }
        else
        {
            $customers = DB::table('customers')->orderBy('id', 'desc')->simplePaginate($limit);
        }
        return view('customers.index')->with('title', $title)->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm khách hàng';
        return view('customers.add')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created_at = $updated_at = date('Y-m-d H:i:s');
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthday' => 'required'
        ],[
            'name.required' => 'Tên không hợp lệ',
            'address.required' => 'Địa chỉ không hợp lệ',
            'phone.required' => 'Số điện thoại không hợp lệ',
            'birthday.required' => 'Ngày sinh không hợp lệ'
        ]);

        DB::table('customers')->insert([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ]);

        return back()->with('success', 'Thêm khách hàng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Sửa thông tin khách hàng';
        $customer = DB::table('customers')->where('id', $id)->first();
        return view('customers.show')->with(compact('customer'))->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated_at = date('Y-m-d H:i:s');
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthday' => 'required'
        ],[
            'name.required' => 'Tên không hợp lệ',
            'address.required' => 'Địa chỉ không hợp lệ',
            'phone.required' => 'Số điện thoại không hợp lệ',
            'birthday.required' => 'Ngày sinh không hợp lệ'
        ]);

        DB::table('customers')->where('id', $id)->update([
                                            'name' => $data['name'],
                                            'address' => $data['address'],
                                            'phone' => $data['phone'],
                                            'birthday' => $data['birthday'],
                                            'updated_at' => $updated_at
        ]);

        return back()->with('success', 'Sửa thông tin khách hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('customers')->where('id', $id)->delete();
        return back()->with('success', 'Xóa thông tin khách hàng thành công');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            if($request->search != ''){
                $customers = DB::table('customers')->where('name', 'like', "%{$request->search}%")->orwhere('phone', 'like', "%{$request->search}%")->get();
                if ($customers) {
                    foreach ($customers as $key => $value) {
                        $output .= '<a href="'.route('customer.edit', $value->id).'" class="d-flex align-items-center">
                                        <p class="text-dark m-0 ml-3 mt-1 mb-1">'.$value->name.'</p>
                                    </a>';
                    }
                }
            }
            return Response($output);
        }
    }
}
