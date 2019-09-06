@extends('errors::minimal')

@section('title', __('Você excedeu o limite de chamados para esta página.'))
@section('code', '429')
@section('message', __('Você excedeu o limite de chamados para esta página.'))
