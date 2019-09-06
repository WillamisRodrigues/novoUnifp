@extends('errors::minimal')

@section('title', __('Você não possui autorização para acessar essa página.'))
@section('code', '401')
@section('message', __('Você não possui autorização para acessar essa página.'))
