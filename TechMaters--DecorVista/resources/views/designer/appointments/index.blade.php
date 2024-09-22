@extends('designer.layouts.layout')
@section('title')
Appointments
@endsection

@section('main-section')

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="d-flex mb-3">
            <div class="mb-3 align-items-center me-auto">
                <h4 class="card-title">Consult Appointments</h4>
                <span class="fs-12">Here, Professional Interior Designers will view the consultation appointment requests</span>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-primary" role="alert">
 {{ session('success') }}
</div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="table-responsive fs-14">
                    <table id="productCategoriesTable" class="table table-striped">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th>#</th>
                                <th>Time Slot</th>
                                <th>Recipient</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Appointments as $ap)
                            <tr>
                                <td>{{ $ap->id }}</td>
                                <td>
                                    @if($ap->portfolios && $ap->portfolios->consultants)
                                    @foreach($ap->portfolios->consultants as $consultant)
                                        @if(is_array($consultant->available_at))
                                            @foreach($consultant->available_at as $timeSlot)
                                                {{ $timeSlot }}<br>
                                            @endforeach
                                        @else
                                            {{ $consultant->available_at }}
                                        @endif
                                        <hr>
                                    @endforeach
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>{{ $ap->user->name }}</td>
                                <td>{{ $ap->user->email }}</td>
                                <td>{{ $ap->status }}</td>
                                <td>
                                    <!-- Approve Button -->
                                    <form action="{{ route('designer.appointments.updateStatus', ['id' => $ap->id   ]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Change Status</button>
                                    </form>
                                    
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection
