@extends('backapp')

@section('content')


    <h1> Customization Groups </h1>
    <div class="panel-group" id="customizationGroups" role="tablist" aria-multiselectable="true">
        @forelse($customization_groups as $customization_group)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading{{$customization_group['id']}}">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="customizatonGroups" href="#collapse{{$customization_group['id']}}" aria-expanded="true" aria-controls="collapse{{$customization_group['id']}}">
                                {{$customization_group['name']}}

                                <a style="float: right;" href="{{ action('CustomizationGroupController@edit', [$customization_group->id]) }}">Edit</a>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{$customization_group['id']}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$customization_group['id']}}">
                        <div class="panel-body">

                            <ul>
                                @foreach($customization_group->customizations as $customization)
                                    <li><a href="{{action('CustomizationController@edit', $customization->id)}}">{{$customization['name']}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
        @empty

            No records to display!

        @endforelse
    </div>

@stop

@section('sidebar')

    <h3>Add New Customization Group:</h3>
    {!! Form::open(['url' => '/business/customization_groups']) !!}
        @include('errors.list')

        @include('customizationgroups.form', ['submitButtonText' => 'Add Group'])

    {!! Form::close() !!}

@stop