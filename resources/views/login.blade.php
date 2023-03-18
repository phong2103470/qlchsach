@extends('welcome')
@section('content')
        <section id="form"><!--form-->
            <div class="container pt-3">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2 class="font-weight-bold">Đăng nhập</h2>
                            <hr>
                            <form action="{{URL::to('/costumer-check')}}" method="post">
                                {{ csrf_field() }}
                                <input type="text" class="ggg" name="sdt" placeholder="Nhập số điện thoại" required="">
			                    <input type="password" class="ggg" name="password" placeholder="Nhập password" required="">
                                <span>
                                    <input type="checkbox" class="checkbox">
                                    Nhớ lần đăng nhập tiếp theo
                                </span>
                                <button type="submit" class="btn btn-default">Đăng nhập</button>
                            </form>
                        </div><!--/login form-->
                        <?php
                            $message= Session::get('message');
                            if($message){
                                echo '<span class="">'. $message .'</span>';
                                Session::put('message', null);
                            }
                            ?>
                    </div>

                    <div class="col-sm-2">
                        <h2 class="or form-center">OR</h2>
                    </div>

                    <div class="col-sm-5">
                        <div class="signup-form"><!--sign up form-->
                            <h2 class="font-weight-bold">Đăng ký</h2>
                            <hr>
                            <form action="#">
                                <input type="text" placeholder="Name" />
                                <input type="email" placeholder="Email Address" />
                                <input type="password" placeholder="Password" />
                                <button type="submit" class="btn btn-default">Đăng ký</button>
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->

@endsection
