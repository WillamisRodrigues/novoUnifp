@extends('errors::minimal')

@section('title', __('Você não possui permissão para acessar essa página.'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Você não possui permissão para acessar essa página.'))
