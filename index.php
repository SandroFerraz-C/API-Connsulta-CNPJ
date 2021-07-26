<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>API Receita Federal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
<form>
  <div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4">
      <div class="form-group row">
        <div class="col-md-12"><br /><br />
          <label>CNPJ</label>
          <input type="text" onblur="checkCnpj(this.value)" data-mask="00.000.000/0000-00" class="form-control" >
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label>Razão Social</label>
          <input type="text" id="razaoSocial" class="form-control" >
        </div>

        <div class="col-md-6">
          <label>Nome Fantasia</label>
          <input type="text" id="fantasia" class="form-control" >
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label>Logradouro</label>
          <input type="text" id="logradouro" class="form-control" >
        </div>

        <div class="col-md-6">
          <label>Número</label>
          <input type="text" id="numero" class="form-control" >
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label>Municipio</label>
          <input type="text" id="municipio" class="form-control" >
        </div>

        <div class="col-md-6">
          <label>UF</label>
          <input type="text" id="uf" class="form-control" >
        </div>
      </div>
    </div>

    <div class="col-md-4"></div>
  </div>


      </fieldset>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    function checkCnpj(cnpj) {
      $.ajax({
        'url': 'https://www.receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''),
        'type': "GET",
        'dataType': 'jsonp',
        'success': function(data){
          if(data.nome == undefined ){
            alert(data.status + " " + data.message)
          }else{
            document.getElementById ("razaoSocial").value = data.nome;
            document.getElementById ("fantasia").value = data.fantasia;
            document.getElementById ("logradouro").value = data.logradouro;
            document.getElementById ("numero").value = data.numero;
            document.getElementById ("municipio").value = data.municipio;
            document.getElementById ("uf").value = data.uf;
          }
         // console.log(dado.situacao);
        }
      })
    }
  </script>
</body>
</html>