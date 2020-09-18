<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;
use File;
use Auth;
use Response;
use Hash;
use Carbon\Carbon;
use Cache;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->path = public_path('profile');
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $admins = \App\Models\User::get();
        $users = \App\Models\User::where('id',Auth::user()->id)->get();

        return view('users.index')
            ->with('users', $users)
            ->with('admins', $admins)
            ;
    }

    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
            else
                echo "User " . $user->name . " is offline.";
        }
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        $file = $request->file('profile');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($this->path, $fileName);

        $input = $request->all();
        $input['profile'] = $fileName;
        // untuk membuat login user gudep
        $input['password'] = Hash::make($input['password']); 
        $user = $this->userRepository->create($input);

        Alert::success('User Berhasil Disimpan.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Alert::error('User Tidak Ditemukan');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Alert::error('User Tidak Ditemukan');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Alert::error('User Tidak Ditemukan');

            return redirect(route('users.index'));
        }
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        // $file = $request->file('picture');
        // $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // $file->move($this->path, $fileName);
        // $input = $request->all();

        if ($request->file('profile')){
            $file = $request->file('profile');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $fileName);
            $image_path = public_path('profile/'.$user->profile);
            File::delete($image_path);
            $input['profile'] = $fileName;
        }else{
            // $user->name = $request->name;
            // $user->email = $request->email;
            $input['profile'] = $user->profile;
            // $user->password = Hash::make($request['password']);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->profile || $request->password || $request->akses){
            $user->profile = $fileName;
            $user->akses = $request->akses;
            $user->password = Hash::make($request['password']);
        }
        $user->save();
        // $user = $this->userRepository->update($request->all(), $id);

        Alert::success('User Berhasil Diupdate.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Alert::error('User Tidak Ditemukan');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Alert::success('User Berhasil Dihapus.');

        return redirect(route('users.index'));
    }
}