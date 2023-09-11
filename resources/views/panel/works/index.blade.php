@extends('panel.layouts.app')

@section('body')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-12">
                @if(session()->has('deleteSuccess'))
                    <div class="alert alert-success text-center">
                        Başarı İle Silindi
                    </div>
                @endif
                <h4 class="page-title">İş Ortaklarımız</h4>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <a href="{{ route('works.create') }}" class="button button-success">Yeni Ekle</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Sıra</th>
                                    <th>Resim</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($works as $item)
                                    <tr>
                                        <th>{{$item['title']}}</th>
                                        <th>{{$item['sira']}}</th>
                                        <td><img src="{{ asset('images') .  '/' . $item['image_url']}}" style="width: 10em"></td>

                                        <td>
                                            <div class="button-list">
                                                <a href="{{ route('works.edit', ['work' => $item['id'],'data' => $item]) }}"
                                                   class="btn btn-success-rgba"><i
                                                        class="feather icon-edit-2"></i></a>
                                                <form method="POST"
                                                      action="{{ route('works.destroy', ['work' => $item['id'],'data' => $item]) }} ">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" href="page-product-detail.html"
                                                            class="btn btn-danger-rgba"><i
                                                            class="feather icon-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
@endsection
