<?php

	namespace App\Http\Controllers\Dashboard;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\User;
	use Carbon\Carbon;

	class IndexController extends Controller {
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index() {

			//

		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create() {



		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request) {

			$this->validate($request, [
					'name'     => 'required|max:255',
					'email'    => 'required|email|max:255|unique:users',
					'password' => 'required|min:6',
			]);

			User::create([
					'name'     => $request->input()['name'],
					'email'    => $request->input()['email'],
					'password' => bcrypt($request->input()['password']),
			]);

			return redirect('/admin/users');

		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($id) {
			//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit($id) {
			$now = Carbon::now()->toTimeString();
			$user = User::where('id', $id)->get();
			return view('dashboard.edit', compact('user', 'now'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $id) {

			$this->validate($request, [
					'name'     => 'required|max:255',
					'email'    => 'required|email|max:255',
					'password' => 'required|min:6',
			]);

			$user = User::findorfail($id);

			if ($user) {
				$user->name = $request->input()['name'];
				$user->email = $request->input()['email'];
				$user->password = bcrypt($request->input()['password']);
				$user->save();

				return redirect('/admin/users');

			}

		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id) {
			User::findOrFail($id)->delete();

			$request->session()->flash('status', 'Task was successful!');

			return redirect('/admin/users');

		}
	}
