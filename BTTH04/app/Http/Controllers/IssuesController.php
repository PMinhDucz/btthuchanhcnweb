<?php

namespace App\Http\Controllers;

use App\Models\Computers;
use App\Models\Issues;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issues::with('computer')->paginate(5); // Lấy 5 bản ghi mỗi trang
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $computers = Computers::all(); // Lấy danh sách sinh viên để chọn
        return view('issues.create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Xác thực dữ liệu từ form
    $request->validate([
        'computer_id' => 'required|exists:computers,id', // Kiểm tra máy tính có tồn tại không
        'reported_by' => 'required|max:255',
        'reported_date' => 'required|date',
        'description' => 'required',
        'urgency' => 'required',
        'status' => 'required',
    ]);

    // Tạo một issue mới và lưu vào database
    Issues::create([
        'computer_id' => $request->computer_id,
        'reported_by' => $request->reported_by,
        'reported_date' => $request->reported_date,
        'description' => $request->description,
        'urgency' => $request->urgency,
        'status' => $request->status,
    ]);

    // Chuyển hướng người dùng về trang danh sách các issues với thông báo thành công
    return redirect()->route('issues.index')->with('success', 'Issue created successfully!');
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
        $issues = Issues::findOrFail($id);
        $computers = Computers::all();
        return view('issues.edit', compact('issues', 'computers'));
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
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        $issues = Issues::find($id);

        $issues->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issues = Issues::findOrFail($id);
        $issues->delete();

        return redirect()->route('issues.index')->with('success', 'Đồ án đã được xóa thành công!');
    }
}
