@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h3 style="color: mediumvioletred">Thêm thông tin con của bạn</h3>
                <hr>
                <form action="{{ route('storeProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-7">
                            <img src="{{ url('storage/images/123.png') }}" id="upfile1"
                                style="cursor:pointer; with: 150px; height: 150px" />
                            <input type="file" name="image" id="file1" class="form-control-file" style="display:none"
                                />
                        </div>
                        <div class="col-2">
                            <input type="radio" name="gender" value="Bé Trai" />
                            <label>Bé trai</label><br>
                            <input type="radio" name="gender" value="Bé Gái" />
                            <label>Bé Gái</label>
                            @if ($errors->any())
                                <p style="color: red"> {{ $errors->first('gender') }}</p>
                            @endif
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Họ tên hay tên hay gọi của bé</label>
                                <input type="text" name="name" style="border: none; border-bottom: 1px solid #999;"
                                    placeholder="Tên thường gọi của bé"  />
                                @if ($errors->any())
                                    <p style="color: red"> {{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh của bé</label>
                                <input type="date" name="dob" style="border: none; border-bottom: 1px solid #999;"
                                    />
                                @if ($errors->any())
                                    <p style="color: red"> {{ $errors->first('dob') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="" value="con bạn sinh non" />
                                <label>Con bạn sinh non?</label>
                                <input type="number" name="late" style="border: none; border-bottom: 1px solid #999;">
                                @if ($errors->any())
                                    <p style="color: red"> {{ $errors->first('late') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Bạn là :</label>
                                <select name="pamily" style="border: none; border-bottom: 1px solid #999;">
                                    <option value="">Bố hay Mẹ</option>
                                    <option value="Bố">Bố</option>
                                    <option value="Mẹ">Mẹ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm </button>
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
