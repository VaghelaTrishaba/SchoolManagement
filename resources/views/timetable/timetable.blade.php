@extends('layout.mainlayout')

@section('title')
    | Time Table
@endsection

<link rel="stylesheet" href="{{ asset('mobiscroll/css/mobiscroll.javascript.min.css') }}">

<style>
    .timetable-box {
        background:#f2f1f0;
        width:110%;
        height:400px;      
        margin:30px;
        overflow:hidden;  
    }

    #demo-desktop-day-view {
        height:100%;
    }
</style>

@section('content')

<h1 style="margin-left:20px; font-size:30px;">
    <b>Manage Time Table</b>
</h1>

<div class="timetable-box">
    <div id="demo-desktop-day-view"></div>
</div>

@endsection

<script src="{{ asset('mobiscroll/js/mobiscroll.javascript.min.js') }}"></script>
<script>
    window.addEventListener("load", function () {

        if (typeof mobiscroll === "undefined") {
            console.error("Mobiscroll not loaded");
            return;
        }

        mobiscroll.setOptions({
            theme: 'ios',
            themeVariant: 'light'
        });

        mobiscroll.eventcalendar('#demo-desktop-day-view', {
            clickToCreate: true,
            dragToMove: true,
            dragToResize: true,
            eventDelete: true,
            
            view: {
                schedule: {
                    type: 'day',
                    startTime: '08:00',  
                    endTime: '16:00'     
                }
            },

            data: [
                {
                    title: 'Account',
                    start: '2026-02-16T08:00',
                    end: '2026-02-16T09:00'
                },
                {
                    title: 'Science',
                    start: '2026-02-16T10:00',
                    end: '2026-02-16T11:00'
                },
                {
                    title: 'Science',
                    start: '2026-02-16T13:00',
                    end: '2026-02-16T14:00'
                },
                {
                    title: 'Science',
                    start: '2026-02-17T08:00',
                    end: '2026-02-17T09:00'
                },
                {
                    title: 'Maths',
                    start: '2026-02-17T09:00',
                    end: '2026-02-17T10:00'
                },
                {
                    title: 'Hindi',
                    start: '2026-02-18T10:00',
                    end: '2026-02-18T11:00'
                },
                {
                    title: 'Account',
                    start: '2026-02-17T11:00',
                    end: '2026-02-17T12:00'
                },
                {
                    title: 'Account',
                    start: '2026-02-19T08:00',
                    end: '2026-02-19T09:00'
                },
                {
                    title: 'Maths',
                    start: '2026-02-19T11:00',
                    end: '2026-02-19T12:00'
                },
                {
                    title: 'Account',
                    start: '2026-02-20T08:00',
                    end: '2026-02-20T09:00'
                },
                {
                    title: 'Hindi',
                    start: '2026-02-20T09:00',
                    end: '2026-02-20T10:00'
                },
                {
                    title: 'Account',
                    start: '2026-02-21T08:00',
                    end: '2026-02-21T09:00'
                },
            ]
        });

    });
</script>
