@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="center">New Poll</h2>
        <form class="col s12" method="post" action="{{route('poll.store')}}">

        @csrf
        <div class="row">
        </div>
            <div class="row">
                <div class="input-field col s4">
                    <input required="required" name="title" id="title" type="text" class="validate">
                    <label for="title">Title</label>
                    @error('title')
                    {{$message}}
                    @enderror
                </div>


                <div class="input-field col s4">
                    <input required="required" type="text" class="datepicker" placeholder="start date" name="start_date">
                    <label for="title">start date</label>
                    @error('start_at')
                    {{$message}}
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input required="required" type="text" class="timepicker" placeholder="start time" name="start_time">
                    <label for="title">start time</label>
                </div>
                <div class="input-field col s4">
                    <input required="required" type="text" class="datepicker" placeholder="end date" name="end_date">
                    <label for="title">end date</label>
                </div>

                <div class="input-field col s4">
                    <input required="required" type="text" class="timepicker" placeholder="end time" name="end_time">
                    <label for="title">end time</label>
                    @error('end_at')
                    {{$message}}
                    @enderror
                </div>


            </div>

            @php
            $a=[1,2,3,4];
            @endphp
            <div class="row col s12" x-data="{
                optionsNumber:2
            }">
                <h4>
                    Options
                </h4>
                <template x-for="i,index in optionsNumber">
                    <div class="row">
                        <div class="col s6">
                            <input required="required" name="options[][content]" id="title" type="text" class="validate" :placeholder="`Option` + i">
                        </div>

                        <div class="col s6">
                            <button
                                x-on:click="optionsNumber > 2 ? optionsNumber-- : alert('poll must has at least 2 options')"
                                class="waves-effect waves-light btn red darken-4" type="button">
                                remove
                            </button>
                        </div>
                    </div>
            </div>
            </template>
            <button x-on:click="optionsNumber++" class="waves-effect waves-light btn info darken-2" type="button">
                add option
            </button>
            <hr>
            <div class="center">

                <button class="waves-effect waves-light btn cyan darken-2" type="submit">
                    Create
                </button>
            </div>
    </div>
    </form>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dates = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(dates);
        var tiems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(tiems);
      });
</script>
@endsection