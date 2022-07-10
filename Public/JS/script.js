function Inicio() {

    document.getElementById('Inicio-click').style.display = 'block';
    document.getElementById('funcionario-click').style.display = 'none';
    document.getElementById('empresa-click').style.display = 'none';
  }

function Funcionario() {
    document.getElementById('funcionario-click').style.display = 'block';
    document.getElementById('Inicio-click').style.display = 'none';
    document.getElementById('empresa-click').style.display = 'none';
}

function Empresa() {
    document.getElementById('empresa-click').style.display = 'block';
    document.getElementById('funcionario-click').style.display = 'none';
    document.getElementById('Inicio-click').style.display = 'none';
}

