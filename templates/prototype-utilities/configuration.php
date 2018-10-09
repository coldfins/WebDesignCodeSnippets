<?php
/**
  * @templatename: Prototype Configuration
  */
global $classes;
$classes = 'styleguide';
?>

<!-- Intro -->
<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Prototype Konfiguration</h1>
        <p>Diese Seite fasst die optischen Elemente zusammen und zeigt diese exemplarisch im Zusammenspiel mit weiteren Elementen</p>
      </div>
    </div>
  </div>
</section>

<!-- Farben -->
<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section"><a id="farben" href="#farben">#</a> Farben</h2>
        <div class="color-wrapper primary">
          <div class="main"></div>
          <div class="light"></div><div class="dark"></div>
          <div class="label"></div>
        </div>
        <div class="color-wrapper secondary">
          <div class="main"></div>
          <div class="light"></div><div class="dark"></div>
          <div class="label"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Schrift -->
<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section"><a id="schriften-texte" href="#schriften-texte">#</a> Schrift und Text</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p class="font">
          <small><i><a id="schriftart" href="#schriftart">&raquo;</a> Schriftart</i></small><br/><span class="family"></span><span class="size"><small>Schriftgrösse</small></span><span class="line-height"><small>Zeilenhöhe</small></span>
        </p>
        <p class="headings">
          <small><i><a id="titelzeilen" href="#titelzeilen">&raquo;</a>  Titelzeilen</i></small>
        </p>
        <h1>Luzern Tourismus (h1)</h1>
        <h2>Luzern Tourismus (h2)</h2>
        <h3>Luzern Tourismus (h3)</h3>
        <h4>Luzern Tourismus (h4)</h4>
        <h5>Luzern Tourismus (h5)</h5>
        <h6>Luzern Tourismus (h6)</h6>
      </div>
      <div class="col-12">
        <p class="paragraph">
          <small><i><a id="abschnitt" href="#abschnitt">&raquo;</a>  Beispiel-Abschnitt</i></small>
        </p>
        <h2>Die Beute</h2>
        <p>Er hörte leise Schritte hinter sich. Das bedeutete nichts Gutes. Wer würde ihm schon folgen, spät in der Nacht und dazu noch in dieser engen Gasse mitten im übel beleumundeten Hafenviertel? Gerade jetzt, wo er das Ding seines Lebens gedreht hatte und mit der Beute verschwinden wollte! Hatte einer seiner zahllosen Kollegen dieselbe Idee gehabt, ihn beobachtet und abgewartet, um ihn nun um die Früchte seiner Arbeit zu erleichtern? Oder gehörten die Schritte hinter ihm zu einem der unzähligen Gesetzeshüter dieser Stadt, und die stählerne Acht um seine Handgelenke würde gleich zuschnappen?</p>
        <p class="paragraph">
          <small><i><a id="formatierungen" href="#formatierungen">&raquo;</a>  Formatierungen</i></small>
        </p>
        <p>Jemand musste <strong>Josef K.</strong> verleumdet haben, denn <u>ohne</u> dass er etwas Böses getan hätte, wurde er eines Morgens verhaftet. <em>»Wie ein Hund!«</em> sagte er, es war, als sollte die Scham ihn überleben.</p>
      </div>
    </div>
  </div>
</section>

<!-- Elemente -->
<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section"><a href="#elemente" id="elemente">#</a> Elemente</h2>
      </div>
    </div>
    <!-- Zitat -->
    <div class="row">
      <div class="col-12">
        <div>
          <small><i><a href="#zitat" id="zitat">&raquo;</a> Zitat</i></small>
          <blockquote>
            <p>Als Gregor Samsa eines Morgens aus unruhigen Träumen erwachte, fand er sich in seinem Bett zu einem ungeheueren Ungeziefer verwandelt.</p>
          </blockquote>
        </div>

      </div>
    </div>
    <!-- Listen -->
    <div class="row">
      <div class="col-12">
        <small><i><a href="#listen" id="listen">&raquo;</a> Listen</i></small>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <ul>
          <li>Sie hätten noch ins Boot springen können, aber der Reisende hob ein schweres, geknotetes Tau vom Boden.</li>
          <li>Aber sie überwanden sich, umdrängten den Käfig und wollten sich gar nicht fortrühren.</li>
          <li>Welcher keine daraus resultierende Freude nach sich zieht, außer um Vorteile daraus zu ziehen?</li>
        </ul>
      </div>
      <div class="col-12">
        <ol>
          <li>Grobkonzept mit Mockups</li>
          <li>Detailkonzept mit Prototyp</li>
          <li>Frontend-Code und CMS mit Funktionalität</li>
          <li>Inhalte und Medien</li>
        </ol>
      </div>
    </div>
    <!-- Verlinkungen -->
    <div class="row">
      <div class="col-12">
        <small><i><a href="#verlinkungen" id="verlinkungen">&raquo;</a> Verlinkungen</i></small>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p>&raquo;Es ist ein eigentümlicher Apparat«, sagte der <a href="#" title="interner Link">Offizier</a> zu dem Forschungsreisenden und überblickte mit einem gewissermaßen bewundernden Blick den ihm doch <a class="external ext" href="#" title="externer Link">wohlbekannten Apparat</a>.</p>
        <ul>
          <li>
            <a href="/" title="Zur Startseite">Startseite</a>
          </li>
          <li>
            <a href="http://www.unicode.org/versions/Unicode4.0.0/ch06.pdf" title="Schreibsysteme und Punktuation" type="application/pdf">Unicode Standard, Kapitel&nbsp;6</a>
          </li>
        </ul>

      </div>
    </div>

  </div>
</section>

<!-- Formulare -->
<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section"><a href="#formulare" id="formulare">#</a> Formulare</h2>
      </div>
    </div>
  </div>
</section>

<!-- Tabellen -->
<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section"><a href="#tabellen" id="tabellen">#</a> Tabellen</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <table>
          <caption>
            Sample table: Areas of the Nordic countries, in sq km
          </caption>
          <tbody><tr>
            <th scope="col">Country</th>
            <th scope="col">Total area</th>
            <th scope="col">Land area</th>
          </tr>
          <tr>
            <th scope="row">Denmark</th>
            <td>43,070</td>
            <td>42,370</td>
          </tr>
          <tr>
            <th scope="row">Finland</th>
            <td>337,030</td>
            <td>305,470</td>
          </tr>
          <tr>
            <th scope="row">Iceland</th>
            <td>103,000</td>
            <td>100,250</td>
          </tr>
          <tr>
            <th scope="row">Norway</th>
            <td>324,220</td>
            <td>307,860</td>
          </tr>
          <tr>
            <th scope="row">Sweden</th>
            <td>449,964</td>
            <td>410,928</td>
          </tr>
        </tbody></table>
      </div>
    </div>
  </div>
</section>
