@extends('layouts.frontend')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="{{ route('updateProfile', $userProfile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ url('storage/images/123.png') }}" id="upfile1"
                                style="cursor:pointer; with: 150px; height: 150px" required/>
                            <input type="file" name="image" id="file1" class="form-control-file" value="{{ $userProfile->image }}" style="display:none"
                                required />
                        </div>
                        <div class="col-2">
                            <input type="radio" name="gender" value="Bé Trai" required />
                            <label>Bé trai</label><br>
                            <input type="radio" name="gender" value="Bé Gái" required />
                            <label>Bé Gái</label>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Họ tên hay tên hay gọi của bé :</label>
                                <input type="text" name="name" value="{{ $userProfile->name }}" style="border: none; border-bottom: 1px solid #999;"
                                    placeholder="Tên thường gọi của bé" required />
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh của bé :</label>
                                <input type="date" name="dob" value="{{ $userProfile->dob }}" style="border: none; border-bottom: 1px solid #999;"
                                    required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="" value="con bạn sinh non" />
                                <label>Con bạn sinh non?</label>
                                <input type="number" name="late" style="border: none; border-bottom: 1px solid #999;">

                            </div>
                            <div class="form-group">
                                <label>Bạn là :</label>
                                <select name="pamily" id="" style="border: none; border-bottom: 1px solid #999;">
                                    <option value="">Bố hay Mẹ</option>
                                    <option value="Bố">Bố</option>
                                    <option value="Mẹ">Mẹ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhập </button>

                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <script>
        $("#upfile1").click(function() {
            $("#file1").trigger('click');
        });

    </script>
@endsection
