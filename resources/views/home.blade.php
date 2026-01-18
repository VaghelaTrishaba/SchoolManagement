@extends('layout.mainlayout')

@section('title')
    Home
@endsection

@section('content')
    <style>
        h4{
            margin-left:-83%;
            margin-top:-2%;
        }
        img{
            margin-left: -100%;
            margin-top:-37;
        }
        table
        {
            margin-top:7%;
            margin-left:10%;
        }
        table tr td  {
            border:2px solid black;
            border-radius: 5px;
            width: 160px;
        }
        td{
            height: 30px;
        }
        td  img {
            margin-left:20%;
            width : 50%;
            height : 110%;
            margin-top:-10%;
        }
    </style>
    <h4><b>Dashbord</b></h4>
    <img src="homee.png" height="5%" width="3.5%">
    <div>
        <img src="background1.jpg" height="30%" width="30%" style="margin-left:-60%;margin-top:10px;border:2px solid white;border-radius:5px;">
        <p style="margin-top:-10%;margin-left:-60%;"><b>Total Teachers</b><br>10</p>
        <img src="background2.avif" height="30%" width="30%" style="margin-left:9%;margin-top:-11%;border:2px solid white;border-radius:5px;">
        <p style="margin-top:-10%;margin-left:8%;"><b>Total Students</b><br>15</p>
        <img src="background1.jpg" height="30%" width="30%" style="margin-left:75%;margin-top:-11%;border:2px solid white;border-radius:5px;">
        <p style="margin-top:-10%;margin-left:80%;"><b>Total Parents</b><br>25</p>
    </div>

    <div>
    
    </div>
@endsection