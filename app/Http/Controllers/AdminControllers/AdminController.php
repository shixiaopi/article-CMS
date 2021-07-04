<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Transformers\AdminTransform;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view(self::THEME_PREFIX . '.admin.index');
    }

    /**
     * 列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(Request $request): \Illuminate\Http\JsonResponse
    {
        $parser = ['username','updated_at','id'];
        return $this->listFormat(new Admin(), $request, $parser, new AdminTransform());
    }

    public function create()
    {
        return view(self::THEME_PREFIX . '.admin.create');
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'username' => 'required|min:3|max:12|unique:admins',
            'password' => 'required|min:6|max:12'
        ]);
        Admin::create([
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password'))
        ]);
        return $this->msg();
    }

    public function show(Admin $admin)
    {
        return view(self::THEME_PREFIX . '.admin.show',compact('admin'));
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'id' => 'required',
            'username' => 'required|min:3|max:12|unique:admins,username,' . $request->id
        ]);
        $admin = Admin::find($request->get('id'));
        if(empty($admin)){
            abort(404,'用户不存在');
        }

        $data['username'] = $request->get('username');
        if($request->get('password')) {
            $data['password'] = bcrypt($request->get('password'));
        }
        $admin->update($data);
        return $this->msg();
    }

    public function destroy(Admin $admin): \Illuminate\Http\JsonResponse
    {
        $admin->delete();
        return $this->msg();
    }
}
