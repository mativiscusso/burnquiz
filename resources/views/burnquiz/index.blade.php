@extends('layouts.app')

@section('content')
<div id="portada" class="container.fluid">
    <main class="row">
        <div id="left" data-aos="fade-up" class="col-12 col-md-6 py-3">
            <span id="titulo">BURN</span>
            <span id="titulo">Quiz</span>
        </div>
        <div id="right" class="col-12 col-md-6 py-3">
            <img src="storage/burnquiz_logo.png" alt=""><br>
            <input type="checkbox" id="cb1" /><label id="cb2" for="cb1"><a id="start" href="/juego">Start</a></label>
        </div>
    </main>
</div>

<section data-aos="fade-in" class="container py-5" id="descripcion">
    <p class="descripcion">Burn Quiz es un juego desarrollado con el fin de ser presentado como trabajo integrador en el curso de Diseño Web FullStack dictado por Digital House.</p>
    <p class="descripcion">La trivia estara compuesta por preguntas capciosas o de pensamiento logico, las cuales tendran 3 posibles respuestas. El objetivo del juego es acumular la mayor cantidad de preguntas acertadas en un lapso de tiempo determinado.</p>
</section>

<div class="container-fluid py-5" id="faqs">
  <div class="accordion container" id="accordionExample">
    <div class="card" data-aos="fade-right">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            ¿Qué es Burn Quiz?
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
    <div class="card" data-aos="fade-right">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button id="" class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            ¿De qué se trata el juego?
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
    <div class="card" data-aos="fade-right">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button id="" class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            ¿Cómo es el tema del puntaje?
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
    <div class="card" data-aos="fade-right">
      <div class="card-header" id="headingFour">
        <h2 class="mb-0">
          <button id="" class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            ¿Dónde puedo consultar mis puntajes?
          </button>
        </h2>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
    <div class="card" data-aos="fade-right">
      <div class="card-header" id="headingFive">
        <h2 class="mb-0">
          <button id="" class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            ¿Si gano soy el mejor?
          </button>
        </h2>
      </div>
      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
  </div>
</div>

<div id="contacto" class="container py-5 my-1">
    <h2 class="display-4 text-center" id="contact">CONTACTANOS</h2>
    <br>
    <main class="row">
    <div class="col-12 col-md-6">
        <div id="left" class="container-fluid" data-aos="fade-in">
            <form action="contacto.php" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nombre</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="nombre" size=30 value="">

                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="email" size=30 value="">

                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput3">Telefono</label>
                    <input type="text" class="form-control" id="formGroupExampleInput3" name="telefono" size=30 value="">

                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2"></label>
                    <textarea name="comentario" id="" cols="90" rows="20"></textarea>
                </div>
                <button class="btn btn-dark" type="submit">Enviar</button>
            </form>
        </div>
      </div>
      <br>

      <div class="col-12 col-md-6">
        <div class="container-fluid" data-aos="flip-down" data-aos-delay="50">
            <section>
                <iframe class="container" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.282049390131!2d-60.65268828599803!3d-32.94356205604301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab3f847dc269%3A0xa8a707d0dded8c7e!2sC%C3%B3rdoba%202035%2C%20S2000AXG%20Rosario%2C%20Santa%20Fe!5e0!3m2!1ses-419!2sar!4v1569074935124!5m2!1ses-419!2sar" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </section>
        </div>
      </div>
    </main>
@endsection