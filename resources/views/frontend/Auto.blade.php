@extends('frontend.header')
@section('auto')
    <div class="container">
        <div class="row justify-content-center" id="autouser">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Войти</div>
                    <div class="card-body">
                        <form id="loging">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Введите почту</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value=""
                                           required="" autocomplete="email" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control " name="password"
                                           required="" autocomplete="current-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Войти
                                    </button>

                                    <a class="btn btn-link" href="http://saittt/password/reset">
                                        Забыли пароль?
                                    </a>
                                    <div id="bottomrg">
                                        <a href="register" class="btn btn-outline-dark" role="button">Создать учетную
                                            запись</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#loging').submit(function (event) {
                event.preventDefault();
                $.ajax({
                    url: 'http://' + location.hostname + '/logging',
                    type: "POST",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function (response) {
                        {
                            if ('success' in response) {
                                window.location.href = "/log";

                            } else {
                                alert('Данные введены не верно');
                            }

                        }
                    }

                })

            })
        })
    </script>
@endsection
