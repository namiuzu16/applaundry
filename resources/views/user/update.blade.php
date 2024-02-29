@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="{{ url('user/update/'.$user->id) }}" method="post">
                @csrf
                <div class="mt-2">
                    <label class="form-label" for="">Nama</label>
                    <input class="form-control" value="{{ $user->namauser }}" type="text" name="namauser" id="">
                    <span class="text-danger">
                        @error('namauser')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Username</label>
                    <input class="form-control" value="{{ $user->username }}" type="text" name="username" id="">
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Password</label>
                    <input class="form-control" value="{{ $user->password }}" type="password" name="password" id="">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            
                <div class="mb-3 mt-3">
                    <label class="form-label" for="">Outlet</label><br>
                    <select name="idoutlet" class="form-select" id="">
                                @foreach ($outlets as $outlet)
                                <option @selected($outlet->idoutlet==$user->idoutlet) value="{{ $outlet->idoutlet }}">{{ $outlet->namaoutlet }}</option>
                            @endforeach
                    </select>
                </div>
               
                <div class="mt-2 mb-5">
                    <label class="form-label" for="">Role</label><br>
                    <select class="form-select" name="role" id="">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>
        
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection