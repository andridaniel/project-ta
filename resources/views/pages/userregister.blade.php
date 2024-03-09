@extends('layouts.main')

@section('konten')
    <div class="px-5 p-2">
        <div class="card card-primary">
            <div class="mt-4">
                <h3 class="text-bold px-3">Add User</h3>
            </div>
            <!-- form start -->
            <form action="{{ route('userregister') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="role">Pilih Peran:</label>
                            </div>
                            <div class="col-md-12">
                                <select id="role" name="role" class="form-control">
                                    <option value="" disabled selected>--Pilih role--</option>
                                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option
                                        value="guru_pembimbing"{{ old('role') === 'guru_pembimbing' ? 'selected' : '' }}>
                                        Guru_pembimbing</option>
                                    <option value="siswa" {{ old('role') === 'siswa' ? 'selected' : '' }}>Siswa</option>
                                </select>
                            </div>
                            @error('role')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="name">Nama</label>
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
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukan Password" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Masukan Password" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


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
