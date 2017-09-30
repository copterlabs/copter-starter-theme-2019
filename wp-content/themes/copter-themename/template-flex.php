<?php
/**
 * Template Name: Copter Page Builder
 */

if( have_rows('flexible_content') ):
    // loop through the rows of data
    while ( have_rows('flexible_content') ) : the_row();
        include('templates/blocks/'.get_row_layout().'.php');
    endwhile;
endif;

if (isset($_GET['display_incomplete_layouts'])) {

  /*====================================
  =            Kitchen Sink            =
  ====================================*/

  ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-10 offset-sm-1">
        <div class="entry-content">

          <h1>Itaque rursus eadem ratione, qua sum paulo ante usus, haerebitis.</h1>

          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores eveniet unde, perspiciatis explicabo numquam quis laudantium. Inventore quasi maiores labore omnis, perspiciatis ratione officiis eius saepe facilis sit tempora unde.</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href='http://loripsum.net/' target='_blank'>Bestiarum vero nullum iudicium puto.</a> <i>Que Manilium, ab iisque M.</i> Item de contrariis, a quibus ad genera formasque generum venerunt. <i>Polycratem Samium felicem appellabant.</i> </p>

          <p><img src="//placekitten.com/360/360" class="alignright" alt="">Illi enim inter se dissentiunt. Duo Reges: constructio interrete. Ne amores quidem sanctos a sapiente alienos esse arbitrantur. Nihil opus est exemplis hoc facere longius. Quasi ego id curem, quid ille aiat aut neget. Egone quaeris, inquit, quid sentiam? Quid turpius quam sapientis vitam ex insipientium sermone pendere? Qui enim existimabit posse se miserum esse beatus non erit. Re mihi non aeque satisfacit, et quidem locis pluribus. <mark>Quid enim?</mark> </p>

          <p>You can use the mark tag to <mark>highlight</mark> text.</p>
          <p><del>This line of text is meant to be treated as deleted text.</del></p>
          <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
          <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
          <p><u>This line of text will render as underlined</u></p>
          <p><small>This line of text is meant to be treated as fine print.</small></p>
          <p><strong>This line rendered as bold text.</strong></p>
          <p><em>This line rendered as italicized text.</em></p>

          <ol>
            <li>Videsne quam sit magna dissensio?</li>
            <li>Maximas vero virtutes iacere omnis necesse est voluptate dominante.</li>
            <li>Alterum significari idem, ut si diceretur, officia media omnia aut pleraque servantem vivere.</li>
            <li>Suam denique cuique naturam esse ad vivendum ducem.</li>
          </ol>

          <h2>Quid, de quo nulla dissensio est?</h2>

          <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          </blockquote>

          <h3>Eam stabilem appellas.</h3>

          <p>An quod ita callida est, ut optime possit architectari voluptates? <b>Idem adhuc;</b> Minime vero, inquit ille, consentit. Tecum optime, deinde etiam cum mediocri amico. Piso, familiaris noster, et alia multa et hoc loco Stoicos irridebat: Quid enim? <a href='http://loripsum.net/' target='_blank'>Et nemo nimium beatus est;</a> <i>Tubulo putas dicere?</i> </p>

          <dl>
            <dt><dfn>Istic sum, inquit.</dfn></dt>
            <dd>Si stante, hoc natura videlicet vult, salvam esse se, quod concedimus;</dd>
            <dt><dfn>Frater et T.</dfn></dt>
            <dd>Octavio fuit, cum illam severitatem in eo filio adhibuit, quem in adoptionem D.</dd>
            <dt><dfn>Sumenda potius quam expetenda.</dfn></dt>
            <dd>Tenesne igitur, inquam, Hieronymus Rhodius quid dicat esse summum bonum, quo putet omnia referri oportere?</dd>
            <dt><dfn>Quid Zeno?</dfn></dt>
            <dd>Sed id ne cogitari quidem potest quale sit, ut non repugnet ipsum sibi.</dd>
          </dl>

          <ul>
            <li>Itaque dicunt nec dubitant: mihi sic usus est, tibi ut opus est facto, fac.</li>
            <li>Non igitur potestis voluptate omnia dirigentes aut tueri aut retinere virtutem.</li>
            <li>Si enim ad populum me vocas, eum.</li>
            <li>Erit enim mecum, si tecum erit.</li>
          </ul>

          <h4>Quid igitur, inquit, eos responsuros putas?</h4>

          <p>Vestri haec verecundius, illi fortasse constantius. <a href='http://loripsum.net/' target='_blank'>Quae duo sunt, unum facit.</a> Hoc est non modo cor non habere, sed ne palatum quidem. Esse enim quam vellet iniquus iustus poterat inpune. Hoc non est positum in nostra actione. Sed quanta sit alias, nunc tantum possitne esse tanta. Tollenda est atque extrahenda radicitus. Quid sequatur, quid repugnet, vident. </p>

          <blockquote cite='http://loripsum.net'>
            Nam hunc ipsum sive finem sive extremum sive ultimum definiebas id esse, quo omnia, quae recte fierent, referrentur neque id ipsum usquam referretur.
          </blockquote>


          <p><b>Negare non possum.</b> Nec vero hoc oratione solum, sed multo magis vita et factis et moribus comprobavit. <a href='http://loripsum.net/' target='_blank'>Minime vero istorum quidem, inquit.</a> Quid est enim aliud esse versutum? </p>

          <h5>Voluptatibus laudantium laboriosam</h5>

          <p class="lead"><img src="//placekitten.com/360/360" class="alignleft" alt="">Illi enim inter se dissentiunt. Duo Reges: constructio interrete. Ne amores quidem sanctos a sapiente alienos esse arbitrantur. Nihil opus est exemplis hoc facere longius. Quasi ego id curem, quid ille aiat aut neget. Egone quaeris, inquit, quid sentiam? Quid turpius quam sapientis vitam ex insipientium sermone pendere? Qui enim existimabit posse se miserum esse beatus non erit. <mark>Quid enim?</mark> </p>

          <h6>Voluptatibus laudantium laboriosam</h6>


          <p>An quod ita callida est, ut optime possit architectari voluptates? <b>Idem adhuc;</b> Minime vero, inquit ille, consentit. Tecum optime, deinde etiam cum mediocri amico. Piso, familiaris noster, et alia multa et hoc loco Stoicos irridebat: Quid enim? <a href='http://loripsum.net/' target='_blank'>Et nemo nimium beatus est;</a> <i>Tubulo putas dicere?</i> </p>


        </div>
      </div>
    </div>
  </div>

  <?php
}
