<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 3</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 3</h1>
<form method="post">
<div class="mb-3">
              <label for="a" class="form-label">Digite o valor para A</label>
              <input type="number" id="a" name="a" class="form-control" required="">
            </div><div class="mb-3">
              <label for="b" class="form-label">Digite o valor para B</label>
              <input type="text" id="b" name="b" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
 <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $a = $_POST['a'];
                $b = $_POST['b'];
                
                if ($a == $b){                   
                    echo "Os valores  são iguais  : $a";
                    }else 
                    {
                        if ($a < $b){
                            echo " $a $b";
                        }else{
                            echo "$b $a";
                        }
                        }
                        
                    }
            
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>