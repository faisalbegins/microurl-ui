@extends('layouts.app')

@section('title', 'List of Short & Long URLs')

@section('page-level-css')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="col-lg-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            {{ $message }}
        </div>
        @endif
        <div class="ibox ">
            <div class="ibox-title">
                <h5>List of Short & Long URls</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Short URL</th>
                            <th>Long URL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($userUrls))
                        @foreach($userUrls as $userUrl)
                        <tr>
                            <td>{{ "http://localhost:8080/".$userUrl['shortUrl'] }}</td>
                            <td>{{ $userUrl['longUrl'] }}</td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Short URL</th>
                            <th>Long URL</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page-level-java-script-library')
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
@endsection

@section('page-level-java-script')
    <script>
        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
@endsection
