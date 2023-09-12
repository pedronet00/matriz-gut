@extends('layouts.main')

@section('title', 'SWOT')

@section('content')

<style>
  .row {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
  }

  .swot{
    width: 90%;
    margin: auto;
  }

  .section {
    flex: 1;
    padding: 0px;
    box-sizing: border-box;
    
  }

  .strength,
  .weak,
  .opportunity,
  .threat {
    width: 50%;
    box-sizing: border-box;
    height: 300px;
  }
</style>

    <h1 style="text-align: center; margin-top: 2%;">Matriz SWOT</h1>

<div class="swot" style="margin: 2% auto;">


    <div class="row row-cols-2 g-3" style="justify-content: center;">
      <div class="col" onload="onload()" style="width: 40%;">
        <div class="card">
          <div class="card-body">
            <h4>Forças</h4>
            <textarea id="strength" onchange="changed()" style="width: 100%; height: 300px;" class="strength"></textarea>
          </div>
        </div>
      </div>
      <div class="col" onload="onload()" style="width: 40%;">
        <div class="card">
          <div class="card-body">
            <h4>Fraquezas</h4>
            <textarea id="weak" onchange="changed()" style="width: 100%; height: 300px;" class="weak"></textarea>
          </div>
        </div>
      </div>
      <div class="col" onload="onload()" style="width: 40%;">
        <div class="card">
          <div class="card-body">
            <h4>Oportunidades</h4>
            <textarea id="opportunity" onchange="changed()" style="width: 100%; height: 300px;" class="opportunity"></textarea>
          </div>
        </div>
      </div>
      <div class="col" onload="onload()" style="width: 40%;">
        <div class="card">
          <div class="card-body">
            <h4>Ameaças</h4>
            <textarea id="threat" onchange="changed()" style="width: 100%; height: 300px;" class="threat"></textarea>
          </div>
        </div>
      </div>
    </div>

</div>

<script>
function changed(){
  var strengths = document.getElementById('strength').value;
  var weaknesses = document.getElementById('weak').value;
  var opportunities = document.getElementById('opportunity').value;
  var threats = document.getElementById('threat').value;
  
  window.localStorage.setItem('data', JSON.stringify({
    strengths: strengths,
    weaknesses: weaknesses,
    opportunities: opportunities,
    threats: threats,
  }));
}

window.addEventListener('load', function () {
  console.log('Loaded');
  try {
    var data = JSON.parse(window.localStorage.getItem('data'));
  } catch (e) {
    console.log('Error');
    window.localStorage.setItem('data', '');
    return;
  }
  document.getElementById('strength').value = data.strengths;
  document.getElementById('weak').value = data.weaknesses;
  document.getElementById('opportunity').value = data.opportunities;
  document.getElementById('threat').value = data.threats;
});
</script>

@endsection


