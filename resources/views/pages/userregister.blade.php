@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-primary">
            <div class="form-group">
                <div>
                    <h3 class="text-bold px-2">Menambhakan Data pengguna</h3>
                </div>
            </div>
            <!-- form start -->
            <form action="{{ route('userregister.create') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="role_id">Pilih Peran:</label>
                            </div>
                            <div class="col-md-12">
                                <select id="role_id" name="role_id" class="form-control">
                                    <option value="" disabled selected>--Pilih role--</option>
                                    @foreach ($role as $role_id)
                                        <option value="{{ $role_id->id }}">{{ $role_id->nama }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            @error('role_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>


                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email"
                            required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No HP </label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan no hp"
                            required>
                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukan Password" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Masukan Password" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


                    <!-- /.card-body -->

                    <div class="form-row card-footer">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn custom-border hover-element btn-block">Tambah</button>
                        </div>
                        <div class="form-group col-md-6">
                            <a href="{{ route('dashboard') }}" class="btn custom-border hover-element btn-block">Batal</a>
                        </div>
                    </div>


            </form>
        </div>
    </div>
@endsection
