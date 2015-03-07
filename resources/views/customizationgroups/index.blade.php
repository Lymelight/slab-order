@extends('backapp')

@section('content')


    <h1> Customization Groups: </h1>
    <div class="panel-group" id="customizationGroups" role="tablist" aria-multiselectable="true">
        @forelse($customization_groups as $customization_group)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading{{$customization_group['id']}}">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="customizatonGroups" href="#collapse{{$customization_group['id']}}" aria-expanded="true" aria-controls="collapse{{$customization_group['id']}}">
                                {{$customization_group['name']}}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{$customization_group['id']}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$customization_group['id']}}">
                        <div class="panel-body">
                            <a href="{{ action('CustomizationGroupController@edit', [$customization_group->id]) }}">Edit</a>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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