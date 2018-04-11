<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cate;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function getTree($cates,$id=0){
        $subtree = [];//子孙数组
        foreach ($cates as $v) {
            if($v->pid==$id){
                $subtree[] = $v;
                $subtree = array_merge($subtree,$this->getTree($cates,$v->id));
            }
        }
        return $subtree;
    }
    public function index(Request $request)
    {
        $cates = Cate::get();
        $cates = $this->getTree($cates,0);
        //搜索条件判断
        $cname = $request->input('cname');
        if(!empty($cname)) {
            $cates = Cate::where('cname','like','%'.$cname.'%')->get();
        }
        // dd($cates);
        return view('Admin.Cate.index',['cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=0)
    {
        $cates = Cate::get();
        $cates = $this->getTree($cates,0);
        return view('Admin.Cate.create',['cates'=>$cates,'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $pid = $input['pid'];
            if ($pid==0) {
                $input['path'] = '0,';
            }else{
                $pcate = Cate::where("id","$pid")->first();
                $input['path'] = $pcate->path.$pid.',';
            }
            $res = Cate::create($input);
           if ($res) {
            return redirect('admin/cate')->with('message','添加成功');
        }else{
            return back()->with('message','添加失败');
        }
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
        // dd($id);
        $cate = Cate::find($id);
        return view('Admin.Cate.edit',['cate'=>$cate]);
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
        $cname = $request->input('cname');
        $cate = Cate::find($id);
        $cate->cname = $cname;
        $res = $cate->save();
        if ($res) {
            return redirect('admin/cate')->with('message','修改成功');
        }else{
            return back()->with('message','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Cate::find($id);
        $son = Cate::where('pid',$id)->first();
        if ($son) {
            return back()->with('message','该类下面有子类不能删除');
        }
        $res = $cate->delete();
        if ($res) {
            return redirect('admin/cate')->with('message','删除成功');
        }
    }
}
