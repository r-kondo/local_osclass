<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<?php $colorMode = osc_get_preference('theme_color_mode', 'osclasswizards_theme');?>
<?php $body_fonts = osc_get_preference('wiz_body_fonts', 'osclasswizards_theme');?>
<?php $heading_fonts = osc_get_preference('wiz_heading_fonts', 'osclasswizards_theme');?>

<h2 class="render-title">
  <?php _e('Theme Style', OSCLASSWIZARDS_THEME_FOLDER); ?>
</h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
  <input type="hidden" name="action_specific" value="theme_style" />
  <fieldset>
    <div class="form-horizontal">
      <div class="form-row">
        <div class="form-label">
          <?php _e('Theme color mode', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <select name="theme_color_mode">
            <option value="green" <?php if($colorMode == 'green'){ echo 'selected="selected"' ; } ?>>
            <?php echo osc_esc_html(__('Green',OSCLASSWIZARDS_THEME_FOLDER));?>
            </option>
            <option value="red" <?php if($colorMode == 'red'){ echo 'selected="selected"' ; } ?>>
            <?php echo osc_esc_html(__('Red',OSCLASSWIZARDS_THEME_FOLDER));?>
            </option>
            <option value="blue" <?php if($colorMode == 'blue'){ echo 'selected="selected"' ; } ?>>
            <?php echo osc_esc_html(__('Blue',OSCLASSWIZARDS_THEME_FOLDER));?>
            </option>
            <option value="purple" <?php if($colorMode == 'purple'){ echo 'selected="selected"' ; } ?>>
            <?php echo osc_esc_html(__('Purple',OSCLASSWIZARDS_THEME_FOLDER));?>
            </option>
            <option value="yellow" <?php if($colorMode == 'yellow'){ echo 'selected="selected"' ; } ?>>
            <?php echo osc_esc_html(__('Yellow',OSCLASSWIZARDS_THEME_FOLDER));?>
            </option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('Body fonts', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <select name="body_fonts">
            <option value="Abel" <?php if($body_fonts == "Abel"){ echo "selected='selected'" ; } ?>>Abel</option>
            <option value="Abril+Fatface" <?php if($body_fonts == "Abril+Fatface"){ echo "selected='selected'" ; } ?>>Abril Fatface</option>
            <option value="Aclonica" <?php if($body_fonts == "Aclonica"){ echo "selected='selected'" ; } ?>>Aclonica</option>
            <option value="Actor" <?php if($body_fonts == "Actor"){ echo "selected='selected'" ; } ?>>Actor</option>
            <option value="Adamina" <?php if($body_fonts == "Adamina"){ echo "selected='selected'" ; } ?>>Adamina</option>
            <option value="Aguafina+Script" <?php if($body_fonts == "Aguafina+Script"){ echo "selected='selected'" ; } ?>>Aguafina Script</option>
            <option value="Aladin" <?php if($body_fonts == "Aladin"){ echo "selected='selected'" ; } ?>>Aladin</option>
            <option value="Aldrich" <?php if($body_fonts == "Aldrich"){ echo "selected='selected'" ; } ?>>Aldrich</option>
            <option value="Alice" <?php if($body_fonts == "Alice"){ echo "selected='selected'" ; } ?>>Alice</option>
            <option value="Alike+Angular" <?php if($body_fonts == "Alike+Angular"){ echo "selected='selected'" ; } ?>>Alike Angular</option>
            <option value="Alike" <?php if($body_fonts == "Alike"){ echo "selected='selected'" ; } ?>>Alike</option>
            <option value="Allan" <?php if($body_fonts == "Allan"){ echo "selected='selected'" ; } ?>>Allan</option>
            <option value="Allerta+Stencil" <?php if($body_fonts == "Allerta+Stencil"){ echo "selected='selected'" ; } ?>>Allerta Stencil</option>
            <option value="Allerta" <?php if($body_fonts == "Allerta"){ echo "selected='selected'" ; } ?>>Allerta</option>
            <option value="Amaranth" <?php if($body_fonts == "Amaranth"){ echo "selected='selected'" ; } ?>>Amaranth</option>
            <option value="Amatic+SC" <?php if($body_fonts == "Amatic+SC"){ echo "selected='selected'" ; } ?>>Amatic SC</option>
            <option value="Andada" <?php if($body_fonts == "Andada"){ echo "selected='selected'" ; } ?>>Andada</option>
            <option value="Andika" <?php if($body_fonts == "Andika"){ echo "selected='selected'" ; } ?>>Andika</option>
            <option value="Annie+Use+Your+Telescope" <?php if($body_fonts == "Annie+Use+Your+Telescope"){ echo "selected='selected'" ; } ?>>Annie Use Your Telescope</option>
            <option value="Anonymous+Pro" <?php if($body_fonts == "Anonymous+Pro"){ echo "selected='selected'" ; } ?>>Anonymous Pro</option>
            <option value="Antic" <?php if($body_fonts == "Antic"){ echo "selected='selected'" ; } ?>>Antic</option>
            <option value="Anton" <?php if($body_fonts == "Anton"){ echo "selected='selected'" ; } ?>>Anton</option>
            <option value="Arapey" <?php if($body_fonts == "Arapey"){ echo "selected='selected'" ; } ?>>Arapey</option>
            <option value="Architects+Daughter" <?php if($body_fonts == "Architects+Daughter"){ echo "selected='selected'" ; } ?>>Architects Daughter</option>
            <option value="Arimo" <?php if($body_fonts == "Arimo"){ echo "selected='selected'" ; } ?>>Arimo</option>
            <option value="Artifika" <?php if($body_fonts == "Artifika"){ echo "selected='selected'" ; } ?>>Artifika</option>
            <option value="Arvo" <?php if($body_fonts == "Arvo"){ echo "selected='selected'" ; } ?>>Arvo</option>
            <option value="Asset" <?php if($body_fonts == "Asset"){ echo "selected='selected'" ; } ?>>Asset</option>
            <option value="Astloch" <?php if($body_fonts == "Astloch"){ echo "selected='selected'" ; } ?>>Astloch</option>
            <option value="Atomic+Age" <?php if($body_fonts == "Atomic+Age"){ echo "selected='selected'" ; } ?>>Atomic Age</option>
            <option value="Aubrey" <?php if($body_fonts == "Aubrey"){ echo "selected='selected'" ; } ?>>Aubrey</option>
            <option value="Bangers" <?php if($body_fonts == "Bangers"){ echo "selected='selected'" ; } ?>>Bangers</option>
            <option value="Bentham" <?php if($body_fonts == "Bentham"){ echo "selected='selected'" ; } ?>>Bentham</option>
            <option value="Bevan" <?php if($body_fonts == "Bevan"){ echo "selected='selected'" ; } ?>>Bevan</option>
            <option value="Bigshot+One" <?php if($body_fonts == "Bigshot+One"){ echo "selected='selected'" ; } ?>>Bigshot One</option>
            <option value="Bitter" <?php if($body_fonts == "Bitter"){ echo "selected='selected'" ; } ?>>Bitter</option>
            <option value="Black+Ops+One" <?php if($body_fonts == "Black+Ops+One"){ echo "selected='selected'" ; } ?>>Black Ops One</option>
            <option value="Bowlby+One+SC" <?php if($body_fonts == "Bowlby+One+SC"){ echo "selected='selected'" ; } ?>>Bowlby One SC</option>
            <option value="Bowlby+One" <?php if($body_fonts == "Bowlby+One"){ echo "selected='selected'" ; } ?>>Bowlby One</option>
            <option value="Brawler" <?php if($body_fonts == "Brawler"){ echo "selected='selected'" ; } ?>>Brawler</option>
            <option value="Bubblegum+Sans" <?php if($body_fonts == "Bubblegum+Sans"){ echo "selected='selected'" ; } ?>>Bubblegum Sans</option>
            <option value="Buda" <?php if($body_fonts == "Buda"){ echo "selected='selected'" ; } ?>>Buda</option>
            <option value="Butcherman+Caps" <?php if($body_fonts == "Butcherman+Caps"){ echo "selected='selected'" ; } ?>>Butcherman Caps</option>
            <option value="Cabin+Condensed" <?php if($body_fonts == "Cabin+Condensed"){ echo "selected='selected'" ; } ?>>Cabin Condensed</option>
            <option value="Cabin+Sketch" <?php if($body_fonts == "Cabin+Sketch"){ echo "selected='selected'" ; } ?>>Cabin Sketch</option>
            <option value="Cabin" <?php if($body_fonts == "Cabin"){ echo "selected='selected'" ; } ?>>Cabin</option>
            <option value="Cagliostro" <?php if($body_fonts == "Cagliostro"){ echo "selected='selected'" ; } ?>>Cagliostro</option>
            <option value="Calligraffitti" <?php if($body_fonts == "Calligraffitti"){ echo "selected='selected'" ; } ?>>Calligraffitti</option>
            <option value="Candal" <?php if($body_fonts == "Candal"){ echo "selected='selected'" ; } ?>>Candal</option>
            <option value="Cantarell" <?php if($body_fonts == "Cantarell"){ echo "selected='selected'" ; } ?>>Cantarell</option>
            <option value="Cardo" <?php if($body_fonts == "Cardo"){ echo "selected='selected'" ; } ?>>Cardo</option>
            <option value="Carme" <?php if($body_fonts == "Carme"){ echo "selected='selected'" ; } ?>>Carme</option>
            <option value="Carter+One" <?php if($body_fonts == "Carter+One"){ echo "selected='selected'" ; } ?>>Carter One</option>
            <option value="Caudex" <?php if($body_fonts == "Caudex"){ echo "selected='selected'" ; } ?>>Caudex</option>
            <option value="Cedarville+Cursive" <?php if($body_fonts == "Cedarville+Cursive"){ echo "selected='selected'" ; } ?>>Cedarville Cursive</option>
            <option value="Changa+One" <?php if($body_fonts == "Changa+One"){ echo "selected='selected'" ; } ?>>Changa One</option>
            <option value="Cherry+Cream+Soda" <?php if($body_fonts == "Cherry+Cream+Soda"){ echo "selected='selected'" ; } ?>>Cherry Cream Soda</option>
            <option value="Chewy" <?php if($body_fonts == "Chewy"){ echo "selected='selected'" ; } ?>>Chewy</option>
            <option value="Chicle" <?php if($body_fonts == "Chicle"){ echo "selected='selected'" ; } ?>>Chicle</option>
            <option value="Chivo" <?php if($body_fonts == "Chivo"){ echo "selected='selected'" ; } ?>>Chivo</option>
            <option value="Coda+Caption" <?php if($body_fonts == "Coda+Caption"){ echo "selected='selected'" ; } ?>>Coda Caption</option>
            <option value="Coda" <?php if($body_fonts == "Coda"){ echo "selected='selected'" ; } ?>>Coda</option>
            <option value="Comfortaa" <?php if($body_fonts == "Comfortaa"){ echo "selected='selected'" ; } ?>>Comfortaa</option>
            <option value="Coming+Soon" <?php if($body_fonts == "Coming+Soon"){ echo "selected='selected'" ; } ?>>Coming Soon</option>
            <option value="Contrail+One" <?php if($body_fonts == "Contrail+One"){ echo "selected='selected'" ; } ?>>Contrail One</option>
            <option value="Convergence" <?php if($body_fonts == "Convergence"){ echo "selected='selected'" ; } ?>>Convergence</option>
            <option value="Cookie" <?php if($body_fonts == "Cookie"){ echo "selected='selected'" ; } ?>>Cookie</option>
            <option value="Copse" <?php if($body_fonts == "Copse"){ echo "selected='selected'" ; } ?>>Copse</option>
            <option value="Corben" <?php if($body_fonts == "Corben"){ echo "selected='selected'" ; } ?>>Corben</option>
            <option value="Cousine" <?php if($body_fonts == "Cousine"){ echo "selected='selected'" ; } ?>>Cousine</option>
            <option value="Coustard" <?php if($body_fonts == "Coustard"){ echo "selected='selected'" ; } ?>>Coustard</option>
            <option value="Covered+By+Your+Grace" <?php if($body_fonts == "Covered+By+Your+Grace"){ echo "selected='selected'" ; } ?>>Covered By Your Grace</option>
            <option value="Crafty+Girls" <?php if($body_fonts == "Crafty+Girls"){ echo "selected='selected'" ; } ?>>Crafty Girls</option>
            <option value="Creepster+Caps" <?php if($body_fonts == "Creepster+Caps"){ echo "selected='selected'" ; } ?>>Creepster Caps</option>
            <option value="Crimson+Text" <?php if($body_fonts == "Crimson+Text"){ echo "selected='selected'" ; } ?>>Crimson Text</option>
            <option value="Crushed" <?php if($body_fonts == "Crushed"){ echo "selected='selected'" ; } ?>>Crushed</option>
            <option value="Cuprum" <?php if($body_fonts == "Cuprum"){ echo "selected='selected'" ; } ?>>Cuprum</option>
            <option value="Damion" <?php if($body_fonts == "Damion"){ echo "selected='selected'" ; } ?>>Damion</option>
            <option value="Dancing+Script" <?php if($body_fonts == "Dancing+Script"){ echo "selected='selected'" ; } ?>>Dancing Script</option>
            <option value="Dawning+of+a+New+Day" <?php if($body_fonts == "Dawning+of+a+New+Day"){ echo "selected='selected'" ; } ?>>Dawning of a New Day</option>
            <option value="Days+One" <?php if($body_fonts == "Days+One"){ echo "selected='selected'" ; } ?>>Days One</option>
            <option value="Delius+Swash+Caps" <?php if($body_fonts == "Delius+Swash+Caps"){ echo "selected='selected'" ; } ?>>Delius Swash Caps</option>
            <option value="Delius+Unicase" <?php if($body_fonts == "Delius+Unicase"){ echo "selected='selected'" ; } ?>>Delius Unicase</option>
            <option value="Delius" <?php if($body_fonts == "Delius"){ echo "selected='selected'" ; } ?>>Delius</option>
            <option value="Devonshire" <?php if($body_fonts == "Devonshire"){ echo "selected='selected'" ; } ?>>Devonshire</option>
            <option value="Didact+Gothic" <?php if($body_fonts == "Didact+Gothic"){ echo "selected='selected'" ; } ?>>Didact Gothic</option>
            <option value="Dorsa" <?php if($body_fonts == "Dorsa"){ echo "selected='selected'" ; } ?>>Dorsa</option>
            <option value="Dr+Sugiyama" <?php if($body_fonts == "Dr+Sugiyama"){ echo "selected='selected'" ; } ?>>Dr Sugiyama</option>
            <option value="Droid+Sans+Mono" <?php if($body_fonts == "Droid+Sans+Mono"){ echo "selected='selected'" ; } ?>>Droid Sans Mono</option>
            <option value="Droid+Sans" <?php if($body_fonts == "Droid+Sans"){ echo "selected='selected'" ; } ?>>Droid Sans</option>
            <option value="Droid+Serif" <?php if($body_fonts == "Droid+Serif"){ echo "selected='selected'" ; } ?>>Droid Serif</option>
            <option value="EB+Garamond" <?php if($body_fonts == "EB+Garamond"){ echo "selected='selected'" ; } ?>>EB Garamond</option>
            <option value="Eater+Caps" <?php if($body_fonts == "Eater+Caps"){ echo "selected='selected'" ; } ?>>Eater Caps</option>
            <option value="Expletus+Sans" <?php if($body_fonts == "Expletus+Sans"){ echo "selected='selected'" ; } ?>>Expletus Sans</option>
            <option value="Fanwood+Text" <?php if($body_fonts == "Fanwood+Text"){ echo "selected='selected'" ; } ?>>Fanwood Text</option>
            <option value="Federant" <?php if($body_fonts == "Federant"){ echo "selected='selected'" ; } ?>>Federant</option>
            <option value="Federo" <?php if($body_fonts == "Federo"){ echo "selected='selected'" ; } ?>>Federo</option>
            <option value="Fjord+One" <?php if($body_fonts == "Fjord+One"){ echo "selected='selected'" ; } ?>>Fjord One</option>
            <option value="Fondamento" <?php if($body_fonts == "Fondamento"){ echo "selected='selected'" ; } ?>>Fondamento</option>
            <option value="Fontdiner+Swanky" <?php if($body_fonts == "Fontdiner+Swanky"){ echo "selected='selected'" ; } ?>>Fontdiner Swanky</option>
            <option value="Forum" <?php if($body_fonts == "Forum"){ echo "selected='selected'" ; } ?>>Forum</option>
            <option value="Francois+One" <?php if($body_fonts == "Francois+One"){ echo "selected='selected'" ; } ?>>Francois One</option>
            <option value="Gentium+Basic" <?php if($body_fonts == "Gentium+Basic"){ echo "selected='selected'" ; } ?>>Gentium Basic</option>
            <option value="Gentium+Book+Basic" <?php if($body_fonts == "Gentium+Book+Basic"){ echo "selected='selected'" ; } ?>>Gentium Book Basic</option>
            <option value="Geo" <?php if($body_fonts == "Geo"){ echo "selected='selected'" ; } ?>>Geo</option>
            <option value="Geostar+Fill" <?php if($body_fonts == "Geostar+Fill"){ echo "selected='selected'" ; } ?>>Geostar Fill</option>
            <option value="Geostar" <?php if($body_fonts == "Geostar"){ echo "selected='selected'" ; } ?>>Geostar</option>
            <option value="Give+You+Glory" <?php if($body_fonts == "Give+You+Glory"){ echo "selected='selected'" ; } ?>>Give You Glory</option>
            <option value="Gloria+Hallelujah" <?php if($body_fonts == "Gloria+Hallelujah"){ echo "selected='selected'" ; } ?>>Gloria Hallelujah</option>
            <option value="Goblin+One" <?php if($body_fonts == "Goblin+One"){ echo "selected='selected'" ; } ?>>Goblin One</option>
            <option value="Gochi+Hand" <?php if($body_fonts == "Gochi+Hand"){ echo "selected='selected'" ; } ?>>Gochi Hand</option>
            <option value="Goudy+Bookletter+1911" <?php if($body_fonts == "Goudy+Bookletter+1911"){ echo "selected='selected'" ; } ?>>Goudy Bookletter 1911</option>
            <option value="Gravitas+One" <?php if($body_fonts == "Gravitas+One"){ echo "selected='selected'" ; } ?>>Gravitas One</option>
            <option value="Gruppo" <?php if($body_fonts == "Gruppo"){ echo "selected='selected'" ; } ?>>Gruppo</option>
            <option value="Hammersmith+One" <?php if($body_fonts == "Hammersmith+One"){ echo "selected='selected'" ; } ?>>Hammersmith One</option>
            <option value="Herr+Von+Muellerhoff" <?php if($body_fonts == "Herr+Von+Muellerhoff"){ echo "selected='selected'" ; } ?>>Herr Von Muellerhoff</option>
            <option value="Holtwood+One+SC" <?php if($body_fonts == "Holtwood+One+SC"){ echo "selected='selected'" ; } ?>>Holtwood One SC</option>
            <option value="Homemade+Apple" <?php if($body_fonts == "Homemade+Apple"){ echo "selected='selected'" ; } ?>>Homemade Apple</option>
            <option value="IM+Fell+DW+Pica+SC" <?php if($body_fonts == "IM+Fell+DW+Pica+SC"){ echo "selected='selected'" ; } ?>>IM Fell DW Pica SC</option>
            <option value="IM+Fell+DW+Pica" <?php if($body_fonts == "IM+Fell+DW+Pica"){ echo "selected='selected'" ; } ?>>IM Fell DW Pica</option>
            <option value="IM+Fell+Double+Pica+SC" <?php if($body_fonts == "IM+Fell+Double+Pica+SC"){ echo "selected='selected'" ; } ?>>IM Fell Double Pica SC</option>
            <option value="IM+Fell+Double+Pica" <?php if($body_fonts == "IM+Fell+Double+Pica"){ echo "selected='selected'" ; } ?>>IM Fell Double Pica</option>
            <option value="IM+Fell+English+SC" <?php if($body_fonts == "IM+Fell+English+SC"){ echo "selected='selected'" ; } ?>>IM Fell English SC</option>
            <option value="IM+Fell+English" <?php if($body_fonts == "IM+Fell+English"){ echo "selected='selected'" ; } ?>>IM Fell English</option>
            <option value="IM+Fell+French+Canon+SC" <?php if($body_fonts == "IM+Fell+French+Canon+SC"){ echo "selected='selected'" ; } ?>>IM Fell French Canon SC</option>
            <option value="IM+Fell+French+Canon" <?php if($body_fonts == "IM+Fell+French+Canon"){ echo "selected='selected'" ; } ?>>IM Fell French Canon</option>
            <option value="IM+Fell+Great+Primer+SC" <?php if($body_fonts == "IM+Fell+Great+Primer+SC"){ echo "selected='selected'" ; } ?>>IM Fell Great Primer SC</option>
            <option value="IM+Fell+Great+Primer" <?php if($body_fonts == "IM+Fell+Great+Primer"){ echo "selected='selected'" ; } ?>>IM Fell Great Primer</option>
            <option value="Iceland" <?php if($body_fonts == "Iceland"){ echo "selected='selected'" ; } ?>>Iceland</option>
            <option value="Inconsolata" <?php if($body_fonts == "Inconsolata"){ echo "selected='selected'" ; } ?>>Inconsolata</option>
            <option value="Indie+Flower" <?php if($body_fonts == "Indie+Flower"){ echo "selected='selected'" ; } ?>>Indie Flower</option>
            <option value="Irish+Grover" <?php if($body_fonts == "Irish+Grover"){ echo "selected='selected'" ; } ?>>Irish Grover</option>
            <option value="Istok+Web" <?php if($body_fonts == "Istok+Web"){ echo "selected='selected'" ; } ?>>Istok Web</option>
            <option value="Jockey+One" <?php if($body_fonts == "Jockey+One"){ echo "selected='selected'" ; } ?>>Jockey One</option>
            <option value="Josefin+Sans" <?php if($body_fonts == "Josefin+Sans"){ echo "selected='selected'" ; } ?>>Josefin Sans</option>
            <option value="Josefin+Slab" <?php if($body_fonts == "Josefin+Slab"){ echo "selected='selected'" ; } ?>>Josefin Slab</option>
            <option value="Judson" <?php if($body_fonts == "Judson"){ echo "selected='selected'" ; } ?>>Judson</option>
            <option value="Julee" <?php if($body_fonts == "Julee"){ echo "selected='selected'" ; } ?>>Julee</option>
            <option value="Jura" <?php if($body_fonts == "Jura"){ echo "selected='selected'" ; } ?>>Jura</option>
            <option value="Just+Another+Hand" <?php if($body_fonts == "Just+Another+Hand"){ echo "selected='selected'" ; } ?>>Just Another Hand</option>
            <option value="Just+Me+Again+Down+Here" <?php if($body_fonts == "Just+Me+Again+Down+Here"){ echo "selected='selected'" ; } ?>>Just Me Again Down Here</option>
            <option value="Kameron" <?php if($body_fonts == "Kameron"){ echo "selected='selected'" ; } ?>>Kameron</option>
            <option value="Kelly+Slab" <?php if($body_fonts == "Kelly+Slab"){ echo "selected='selected'" ; } ?>>Kelly Slab</option>
            <option value="Kenia" <?php if($body_fonts == "Kenia"){ echo "selected='selected'" ; } ?>>Kenia</option>
            <option value="Knewave" <?php if($body_fonts == "Knewave"){ echo "selected='selected'" ; } ?>>Knewave</option>
            <option value="Kranky" <?php if($body_fonts == "Kranky"){ echo "selected='selected'" ; } ?>>Kranky</option>
            <option value="Kreon" <?php if($body_fonts == "Kreon"){ echo "selected='selected'" ; } ?>>Kreon</option>
            <option value="Kristi" <?php if($body_fonts == "Kristi"){ echo "selected='selected'" ; } ?>>Kristi</option>
            <option value="La+Belle+Aurore" <?php if($body_fonts == "La+Belle+Aurore"){ echo "selected='selected'" ; } ?>>La Belle Aurore</option>
            <option value="Lancelot" <?php if($body_fonts == "Lancelot"){ echo "selected='selected'" ; } ?>>Lancelot</option>
            <option value="Lato" <?php if($body_fonts == "Lato"){ echo "selected='selected'" ; } ?>>Lato</option>
            <option value="League+Script" <?php if($body_fonts == "League+Script"){ echo "selected='selected'" ; } ?>>League Script</option>
            <option value="Leckerli+One" <?php if($body_fonts == "Leckerli+One"){ echo "selected='selected'" ; } ?>>Leckerli One</option>
            <option value="Lekton" <?php if($body_fonts == "Lekton"){ echo "selected='selected'" ; } ?>>Lekton</option>
            <option value="Lemon" <?php if($body_fonts == "Lemon"){ echo "selected='selected'" ; } ?>>Lemon</option>
            <option value="Limelight" <?php if($body_fonts == "Limelight"){ echo "selected='selected'" ; } ?>>Limelight</option>
            <option value="Linden+Hill" <?php if($body_fonts == "Linden+Hill"){ echo "selected='selected'" ; } ?>>Linden Hill</option>
            <option value="Lobster+Two" <?php if($body_fonts == "Lobster+Two"){ echo "selected='selected'" ; } ?>>Lobster Two</option>
            <option value="Lobster" <?php if($body_fonts == "Lobster"){ echo "selected='selected'" ; } ?>>Lobster</option>
            <option value="Lora" <?php if($body_fonts == "Lora"){ echo "selected='selected'" ; } ?>>Lora</option>
            <option value="Love+Ya+Like+A+Sister" <?php if($body_fonts == "Love+Ya+Like+A+Sister"){ echo "selected='selected'" ; } ?>>Love Ya Like A Sister</option>
            <option value="Loved+by+the+King" <?php if($body_fonts == "Loved+by+the+King"){ echo "selected='selected'" ; } ?>>Loved by the King</option>
            <option value="Luckiest+Guy" <?php if($body_fonts == "Luckiest+Guy"){ echo "selected='selected'" ; } ?>>Luckiest Guy</option>
            <option value="Maiden+Orange" <?php if($body_fonts == "Maiden+Orange"){ echo "selected='selected'" ; } ?>>Maiden Orange</option>
            <option value="Mako" <?php if($body_fonts == "Mako"){ echo "selected='selected'" ; } ?>>Mako</option>
            <option value="Marck+Script" <?php if($body_fonts == "Marck+Script"){ echo "selected='selected'" ; } ?>>Marck Script</option>
            <option value="Marvel" <?php if($body_fonts == "Marvel"){ echo "selected='selected'" ; } ?>>Marvel</option>
            <option value="Mate+SC" <?php if($body_fonts == "Mate+SC"){ echo "selected='selected'" ; } ?>>Mate SC</option>
            <option value="Mate" <?php if($body_fonts == "Mate"){ echo "selected='selected'" ; } ?>>Mate</option>
            <option value="Maven+Pro" <?php if($body_fonts == "Maven+Pro"){ echo "selected='selected'" ; } ?>>Maven Pro</option>
            <option value="Meddon" <?php if($body_fonts == "Meddon"){ echo "selected='selected'" ; } ?>>Meddon</option>
            <option value="MedievalSharp" <?php if($body_fonts == "MedievalSharp"){ echo "selected='selected'" ; } ?>>MedievalSharp</option>
            <option value="Megrim" <?php if($body_fonts == "Megrim"){ echo "selected='selected'" ; } ?>>Megrim</option>
            <option value="Merienda+One" <?php if($body_fonts == "Merienda+One"){ echo "selected='selected'" ; } ?>>Merienda One</option>
            <option value="Merriweather" <?php if($body_fonts == "Merriweather"){ echo "selected='selected'" ; } ?>>Merriweather</option>
            <option value="Metrophobic" <?php if($body_fonts == "Metrophobic"){ echo "selected='selected'" ; } ?>>Metrophobic</option>
            <option value="Michroma" <?php if($body_fonts == "Michroma"){ echo "selected='selected'" ; } ?>>Michroma</option>
            <option value="Miltonian+Tattoo" <?php if($body_fonts == "Miltonian+Tattoo"){ echo "selected='selected'" ; } ?>>Miltonian Tattoo</option>
            <option value="Miltonian" <?php if($body_fonts == "Miltonian"){ echo "selected='selected'" ; } ?>>Miltonian</option>
            <option value="Miss+Fajardose" <?php if($body_fonts == "Miss+Fajardose"){ echo "selected='selected'" ; } ?>>Miss Fajardose</option>
            <option value="Miss+Saint+Delafield" <?php if($body_fonts == "Miss+Saint+Delafield"){ echo "selected='selected'" ; } ?>>Miss Saint Delafield</option>
            <option value="Modern+Antiqua" <?php if($body_fonts == "Modern+Antiqua"){ echo "selected='selected'" ; } ?>>Modern Antiqua</option>
            <option value="Molengo" <?php if($body_fonts == "Molengo"){ echo "selected='selected'" ; } ?>>Molengo</option>
            <option value="Monofett" <?php if($body_fonts == "Monofett"){ echo "selected='selected'" ; } ?>>Monofett</option>
            <option value="Monoton" <?php if($body_fonts == "Monoton"){ echo "selected='selected'" ; } ?>>Monoton</option>
            <option value="Monsieur+La+Doulaise" <?php if($body_fonts == "Monsieur+La+Doulaise"){ echo "selected='selected'" ; } ?>>Monsieur La Doulaise</option>
            <option value="Montez" <?php if($body_fonts == "Montez"){ echo "selected='selected'" ; } ?>>Montez</option>
            <option value="Montserrat" <?php if($body_fonts == "Montserrat"){ echo "selected='selected'" ; } ?>>Montserrat</option>
            <option value="Mountains+of+Christmas" <?php if($body_fonts == "Mountains+of+Christmas"){ echo "selected='selected'" ; } ?>>Mountains of Christmas</option>
            <option value="Mr+Bedford" <?php if($body_fonts == "Mr+Bedford"){ echo "selected='selected'" ; } ?>>Mr Bedford</option>
            <option value="Mr+Dafoe" <?php if($body_fonts == "Mr+Dafoe"){ echo "selected='selected'" ; } ?>>Mr Dafoe</option>
            <option value="Mr+De+Haviland" <?php if($body_fonts == "Mr+De+Haviland"){ echo "selected='selected'" ; } ?>>Mr De Haviland</option>
            <option value="Mrs+Sheppards" <?php if($body_fonts == "Mrs+Sheppards"){ echo "selected='selected'" ; } ?>>Mrs Sheppards</option>
            <option value="Muli" <?php if($body_fonts == "Muli"){ echo "selected='selected'" ; } ?>>Muli</option>
            <option value="Neucha" <?php if($body_fonts == "Neucha"){ echo "selected='selected'" ; } ?>>Neucha</option>
            <option value="Neuton" <?php if($body_fonts == "Neuton"){ echo "selected='selected'" ; } ?>>Neuton</option>
            <option value="News+Cycle" <?php if($body_fonts == "News+Cycle"){ echo "selected='selected'" ; } ?>>News Cycle</option>
            <option value="Niconne" <?php if($body_fonts == "Niconne"){ echo "selected='selected'" ; } ?>>Niconne</option>
            <option value="Nixie+One" <?php if($body_fonts == "Nixie+One"){ echo "selected='selected'" ; } ?>>Nixie One</option>
            <option value="Nobile" <?php if($body_fonts == "Nobile"){ echo "selected='selected'" ; } ?>>Nobile</option>
            <option value="Nosifer+Caps" <?php if($body_fonts == "Nosifer+Caps"){ echo "selected='selected'" ; } ?>>Nosifer Caps</option>
            <option value="Nothing+You+Could+Do" <?php if($body_fonts == "Nothing+You+Could+Do"){ echo "selected='selected'" ; } ?>>Nothing You Could Do</option>
            <option value="Nova+Cut" <?php if($body_fonts == "Nova+Cut"){ echo "selected='selected'" ; } ?>>Nova Cut</option>
            <option value="Nova+Flat" <?php if($body_fonts == "Nova+Flat"){ echo "selected='selected'" ; } ?>>Nova Flat</option>
            <option value="Nova+Mono" <?php if($body_fonts == "Nova+Mono"){ echo "selected='selected'" ; } ?>>Nova Mono</option>
            <option value="Nova+Oval" <?php if($body_fonts == "Nova+Oval"){ echo "selected='selected'" ; } ?>>Nova Oval</option>
            <option value="Nova+Round" <?php if($body_fonts == "Nova+Round"){ echo "selected='selected'" ; } ?>>Nova Round</option>
            <option value="Nova+Script" <?php if($body_fonts == "Nova+Script"){ echo "selected='selected'" ; } ?>>Nova Script</option>
            <option value="Nova+Slim" <?php if($body_fonts == "Nova+Slim"){ echo "selected='selected'" ; } ?>>Nova Slim</option>
            <option value="Nova+Square" <?php if($body_fonts == "Nova+Square"){ echo "selected='selected'" ; } ?>>Nova Square</option>
            <option value="Numans" <?php if($body_fonts == "Numans"){ echo "selected='selected'" ; } ?>>Numans</option>
            <option value="Nunito" <?php if($body_fonts == "Nunito"){ echo "selected='selected'" ; } ?>>Nunito</option>
            <option value="Old+Standard+TT" <?php if($body_fonts == "Old+Standard+TT"){ echo "selected='selected'" ; } ?>>Old Standard TT</option>
            <option value="Open+Sans+Condensed" <?php if($body_fonts == "Open+Sans+Condensed"){ echo "selected='selected'" ; } ?>>Open Sans Condensed</option>
            <option value="Open+Sans" <?php if($body_fonts == "Open+Sans"){ echo "selected='selected'" ; } ?>>Open Sans</option>
            <option value="Orbitron" <?php if($body_fonts == "Orbitron"){ echo "selected='selected'" ; } ?>>Orbitron</option>
            <option value="Oswald" <?php if($body_fonts == "Oswald"){ echo "selected='selected'" ; } ?>>Oswald</option>
            <option value="Over+the+Rainbow" <?php if($body_fonts == "Over+the+Rainbow"){ echo "selected='selected'" ; } ?>>Over the Rainbow</option>
            <option value="Ovo" <?php if($body_fonts == "Ovo"){ echo "selected='selected'" ; } ?>>Ovo</option>
            <option value="PT+Sans+Caption" <?php if($body_fonts == "PT+Sans+Caption"){ echo "selected='selected'" ; } ?>>PT Sans Caption</option>
            <option value="PT+Sans+Narrow" <?php if($body_fonts == "PT+Sans+Narrow"){ echo "selected='selected'" ; } ?>>PT Sans Narrow</option>
            <option value="PT+Sans" <?php if($body_fonts == "PT+Sans"){ echo "selected='selected'" ; } ?>>PT Sans</option>
            <option value="PT+Serif+Caption" <?php if($body_fonts == "PT+Serif+Caption"){ echo "selected='selected'" ; } ?>>PT Serif Caption</option>
            <option value="PT+Serif" <?php if($body_fonts == "PT+Serif"){ echo "selected='selected'" ; } ?>>PT Serif</option>
            <option value="Pacifico" <?php if($body_fonts == "Pacifico"){ echo "selected='selected'" ; } ?>>Pacifico</option>
            <option value="Passero+One" <?php if($body_fonts == "Passero+One"){ echo "selected='selected'" ; } ?>>Passero One</option>
            <option value="Patrick+Hand" <?php if($body_fonts == "Patrick+Hand"){ echo "selected='selected'" ; } ?>>Patrick Hand</option>
            <option value="Paytone+One" <?php if($body_fonts == "Paytone+One"){ echo "selected='selected'" ; } ?>>Paytone One</option>
            <option value="Permanent+Marker" <?php if($body_fonts == "Permanent+Marker"){ echo "selected='selected'" ; } ?>>Permanent Marker</option>
            <option value="Petrona" <?php if($body_fonts == "Petrona"){ echo "selected='selected'" ; } ?>>Petrona</option>
            <option value="Philosopher" <?php if($body_fonts == "Philosopher"){ echo "selected='selected'" ; } ?>>Philosopher</option>
            <option value="Piedra" <?php if($body_fonts == "Piedra"){ echo "selected='selected'" ; } ?>>Piedra</option>
            <option value="Pinyon+Script" <?php if($body_fonts == "Pinyon+Script"){ echo "selected='selected'" ; } ?>>Pinyon Script</option>
            <option value="Play" <?php if($body_fonts == "Play"){ echo "selected='selected'" ; } ?>>Play</option>
            <option value="Playfair+Display" <?php if($body_fonts == "Playfair+Display"){ echo "selected='selected'" ; } ?>>Playfair Display</option>
            <option value="Podkova" <?php if($body_fonts == "Podkova"){ echo "selected='selected'" ; } ?>>Podkova</option>
            <option value="Poller+One" <?php if($body_fonts == "Poller+One"){ echo "selected='selected'" ; } ?>>Poller One</option>
            <option value="Poly" <?php if($body_fonts == "Poly"){ echo "selected='selected'" ; } ?>>Poly</option>
            <option value="Pompiere" <?php if($body_fonts == "Pompiere"){ echo "selected='selected'" ; } ?>>Pompiere</option>
            <option value="Prata" <?php if($body_fonts == "Prata"){ echo "selected='selected'" ; } ?>>Prata</option>
            <option value="Prociono" <?php if($body_fonts == "Prociono"){ echo "selected='selected'" ; } ?>>Prociono</option>
            <option value="Puritan" <?php if($body_fonts == "Puritan"){ echo "selected='selected'" ; } ?>>Puritan</option>
            <option value="Quattrocento+Sans" <?php if($body_fonts == "Quattrocento+Sans"){ echo "selected='selected'" ; } ?>>Quattrocento Sans</option>
            <option value="Quattrocento" <?php if($body_fonts == "Quattrocento"){ echo "selected='selected'" ; } ?>>Quattrocento</option>
            <option value="Questrial" <?php if($body_fonts == "Questrial"){ echo "selected='selected'" ; } ?>>Questrial</option>
            <option value="Quicksand" <?php if($body_fonts == "Quicksand"){ echo "selected='selected'" ; } ?>>Quicksand</option>
            <option value="Radley" <?php if($body_fonts == "Radley"){ echo "selected='selected'" ; } ?>>Radley</option>
            <option value="Raleway" <?php if($body_fonts == "Raleway"){ echo "selected='selected'" ; } ?>>Raleway</option>
            <option value="Rammetto+One" <?php if($body_fonts == "Rammetto+One"){ echo "selected='selected'" ; } ?>>Rammetto One</option>
            <option value="Rancho" <?php if($body_fonts == "Rancho"){ echo "selected='selected'" ; } ?>>Rancho</option>
            <option value="Rationale" <?php if($body_fonts == "Rationale"){ echo "selected='selected'" ; } ?>>Rationale</option>
            <option value="Redressed" <?php if($body_fonts == "Redressed"){ echo "selected='selected'" ; } ?>>Redressed</option>
            <option value="Reenie+Beanie" <?php if($body_fonts == "Reenie+Beanie"){ echo "selected='selected'" ; } ?>>Reenie Beanie</option>
            <option value="Ribeye+Marrow" <?php if($body_fonts == "Ribeye+Marrow"){ echo "selected='selected'" ; } ?>>Ribeye Marrow</option>
            <option value="Ribeye" <?php if($body_fonts == "Ribeye"){ echo "selected='selected'" ; } ?>>Ribeye</option>
            <option value="Righteous" <?php if($body_fonts == "Righteous"){ echo "selected='selected'" ; } ?>>Righteous</option>
            <option value="Rochester" <?php if($body_fonts == "Rochester"){ echo "selected='selected'" ; } ?>>Rochester</option>
            <option value="Rock+Salt" <?php if($body_fonts == "Rock+Salt"){ echo "selected='selected'" ; } ?>>Rock Salt</option>
            <option value="Rokkitt" <?php if($body_fonts == "Rokkitt"){ echo "selected='selected'" ; } ?>>Rokkitt</option>
            <option value="Rosario" <?php if($body_fonts == "Rosario"){ echo "selected='selected'" ; } ?>>Rosario</option>
            <option value="Ruslan+Display" <?php if($body_fonts == "Ruslan+Display"){ echo "selected='selected'" ; } ?>>Ruslan Display</option>
            <option value="Salsa" <?php if($body_fonts == "Salsa"){ echo "selected='selected'" ; } ?>>Salsa</option>
            <option value="Sancreek" <?php if($body_fonts == "Sancreek"){ echo "selected='selected'" ; } ?>>Sancreek</option>
            <option value="Sansita+One" <?php if($body_fonts == "Sansita+One"){ echo "selected='selected'" ; } ?>>Sansita One</option>
            <option value="Satisfy" <?php if($body_fonts == "Satisfy"){ echo "selected='selected'" ; } ?>>Satisfy</option>
            <option value="Schoolbell" <?php if($body_fonts == "Schoolbell"){ echo "selected='selected'" ; } ?>>Schoolbell</option>
            <option value="Shadows+Into+Light" <?php if($body_fonts == "Shadows+Into+Light"){ echo "selected='selected'" ; } ?>>Shadows Into Light</option>
            <option value="Shanti" <?php if($body_fonts == "Shanti"){ echo "selected='selected'" ; } ?>>Shanti</option>
            <option value="Short+Stack" <?php if($body_fonts == "Short+Stack"){ echo "selected='selected'" ; } ?>>Short Stack</option>
            <option value="Sigmar+One" <?php if($body_fonts == "Sigmar+One"){ echo "selected='selected'" ; } ?>>Sigmar One</option>
            <option value="Signika+Negative" <?php if($body_fonts == "Signika+Negative"){ echo "selected='selected'" ; } ?>>Signika Negative</option>
            <option value="Signika" <?php if($body_fonts == "Signika"){ echo "selected='selected'" ; } ?>>Signika</option>
            <option value="Six+Caps" <?php if($body_fonts == "Six+Caps"){ echo "selected='selected'" ; } ?>>Six Caps</option>
            <option value="Slackey" <?php if($body_fonts == "Slackey"){ echo "selected='selected'" ; } ?>>Slackey</option>
            <option value="Smokum" <?php if($body_fonts == "Smokum"){ echo "selected='selected'" ; } ?>>Smokum</option>
            <option value="Smythe" <?php if($body_fonts == "Smythe"){ echo "selected='selected'" ; } ?>>Smythe</option>
            <option value="Sniglet" <?php if($body_fonts == "Sniglet"){ echo "selected='selected'" ; } ?>>Sniglet</option>
            <option value="Snippet" <?php if($body_fonts == "Snippet"){ echo "selected='selected'" ; } ?>>Snippet</option>
            <option value="Sorts+Mill+Goudy" <?php if($body_fonts == "Sorts+Mill+Goudy"){ echo "selected='selected'" ; } ?>>Sorts Mill Goudy</option>
            <option value="Special+Elite" <?php if($body_fonts == "Special+Elite"){ echo "selected='selected'" ; } ?>>Special Elite</option>
            <option value="Spinnaker" <?php if($body_fonts == "Spinnaker"){ echo "selected='selected'" ; } ?>>Spinnaker</option>
            <option value="Spirax" <?php if($body_fonts == "Spirax"){ echo "selected='selected'" ; } ?>>Spirax</option>
            <option value="Stardos+Stencil" <?php if($body_fonts == "Stardos+Stencil"){ echo "selected='selected'" ; } ?>>Stardos Stencil</option>
            <option value="Sue+Ellen+Francisco" <?php if($body_fonts == "Sue+Ellen+Francisco"){ echo "selected='selected'" ; } ?>>Sue Ellen Francisco</option>
            <option value="Sunshiney" <?php if($body_fonts == "Sunshiney"){ echo "selected='selected'" ; } ?>>Sunshiney</option>
            <option value="Supermercado+One" <?php if($body_fonts == "Supermercado+One"){ echo "selected='selected'" ; } ?>>Supermercado One</option>
            <option value="Swanky+and+Moo+Moo" <?php if($body_fonts == "Swanky+and+Moo+Moo"){ echo "selected='selected'" ; } ?>>Swanky and Moo Moo</option>
            <option value="Syncopate" <?php if($body_fonts == "Syncopate"){ echo "selected='selected'" ; } ?>>Syncopate</option>
            <option value="Tangerine" <?php if($body_fonts == "Tangerine"){ echo "selected='selected'" ; } ?>>Tangerine</option>
            <option value="Tenor+Sans" <?php if($body_fonts == "Tenor+Sans"){ echo "selected='selected'" ; } ?>>Tenor Sans</option>
            <option value="Terminal+Dosis" <?php if($body_fonts == "Terminal+Dosis"){ echo "selected='selected'" ; } ?>>Terminal Dosis</option>
            <option value="The+Girl+Next+Door" <?php if($body_fonts == "The+Girl+Next+Door"){ echo "selected='selected'" ; } ?>>The Girl Next Door</option>
            <option value="Tienne" <?php if($body_fonts == "Tienne"){ echo "selected='selected'" ; } ?>>Tienne</option>
            <option value="Tinos" <?php if($body_fonts == "Tinos"){ echo "selected='selected'" ; } ?>>Tinos</option>
            <option value="Tulpen+One" <?php if($body_fonts == "Tulpen+One"){ echo "selected='selected'" ; } ?>>Tulpen One</option>
            <option value="Ubuntu+Condensed" <?php if($body_fonts == "Ubuntu+Condensed"){ echo "selected='selected'" ; } ?>>Ubuntu Condensed</option>
            <option value="Ubuntu+Mono" <?php if($body_fonts == "Ubuntu+Mono"){ echo "selected='selected'" ; } ?>>Ubuntu Mono</option>
            <option value="Ubuntu" <?php if($body_fonts == "Ubuntu"){ echo "selected='selected'" ; } ?>>Ubuntu</option>
            <option value="Ultra" <?php if($body_fonts == "Ultra"){ echo "selected='selected'" ; } ?>>Ultra</option>
            <option value="UnifrakturCook" <?php if($body_fonts == "UnifrakturCook"){ echo "selected='selected'" ; } ?>>UnifrakturCook</option>
            <option value="UnifrakturMaguntia" <?php if($body_fonts == "UnifrakturMaguntia"){ echo "selected='selected'" ; } ?>>UnifrakturMaguntia</option>
            <option value="Unkempt" <?php if($body_fonts == "Unkempt"){ echo "selected='selected'" ; } ?>>Unkempt</option>
            <option value="Unlock" <?php if($body_fonts == "Unlock"){ echo "selected='selected'" ; } ?>>Unlock</option>
            <option value="Unna" <?php if($body_fonts == "Unna"){ echo "selected='selected'" ; } ?>>Unna</option>
            <option value="VT323" <?php if($body_fonts == "VT323"){ echo "selected='selected'" ; } ?>>VT323</option>
            <option value="Varela+Round" <?php if($body_fonts == "Varela+Round"){ echo "selected='selected'" ; } ?>>Varela Round</option>
            <option value="Varela" <?php if($body_fonts == "Varela"){ echo "selected='selected'" ; } ?>>Varela</option>
            <option value="Vast+Shadow" <?php if($body_fonts == "Vast+Shadow"){ echo "selected='selected'" ; } ?>>Vast Shadow</option>
            <option value="Vibur" <?php if($body_fonts == "Vibur"){ echo "selected='selected'" ; } ?>>Vibur</option>
            <option value="Vidaloka" <?php if($body_fonts == "Vidaloka"){ echo "selected='selected'" ; } ?>>Vidaloka</option>
            <option value="Volkhov" <?php if($body_fonts == "Volkhov"){ echo "selected='selected'" ; } ?>>Volkhov</option>
            <option value="Vollkorn" <?php if($body_fonts == "Vollkorn"){ echo "selected='selected'" ; } ?>>Vollkorn</option>
            <option value="Voltaire" <?php if($body_fonts == "Voltaire"){ echo "selected='selected'" ; } ?>>Voltaire</option>
            <option value="Waiting+for+the+Sunrise" <?php if($body_fonts == "Waiting+for+the+Sunrise"){ echo "selected='selected'" ; } ?>>Waiting for the Sunrise</option>
            <option value="Wallpoet" <?php if($body_fonts == "Wallpoet"){ echo "selected='selected'" ; } ?>>Wallpoet</option>
            <option value="Walter+Turncoat" <?php if($body_fonts == "Walter+Turncoat"){ echo "selected='selected'" ; } ?>>Walter Turncoat</option>
            <option value="Wire+One" <?php if($body_fonts == "Wire+One"){ echo "selected='selected'" ; } ?>>Wire One</option>
            <option value="Yanone+Kaffeesatz" <?php if($body_fonts == "Yanone+Kaffeesatz"){ echo "selected='selected'" ; } ?>>Yanone Kaffeesatz</option>
            <option value="Yellowtail" <?php if($body_fonts == "Yellowtail"){ echo "selected='selected'" ; } ?>>Yellowtail</option>
            <option value="Yeseva+One" <?php if($body_fonts == "Yeseva+One"){ echo "selected='selected'" ; } ?>>Yeseva One</option>
            <option value="Zeyada" <?php if($body_fonts == "Zeyada"){ echo "selected='selected'" ; } ?>>Zeyada</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('Heading fonts', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <select name="heading_fonts">
            <option value="Abel" <?php if($heading_fonts == "Abel"){ echo "selected='selected'" ; } ?>>Abel</option>
            <option value="Abril+Fatface" <?php if($heading_fonts == "Abril+Fatface"){ echo "selected='selected'" ; } ?>>Abril Fatface</option>
            <option value="Aclonica" <?php if($heading_fonts == "Aclonica"){ echo "selected='selected'" ; } ?>>Aclonica</option>
            <option value="Actor" <?php if($heading_fonts == "Actor"){ echo "selected='selected'" ; } ?>>Actor</option>
            <option value="Adamina" <?php if($heading_fonts == "Adamina"){ echo "selected='selected'" ; } ?>>Adamina</option>
            <option value="Aguafina+Script" <?php if($heading_fonts == "Aguafina+Script"){ echo "selected='selected'" ; } ?>>Aguafina Script</option>
            <option value="Aladin" <?php if($heading_fonts == "Aladin"){ echo "selected='selected'" ; } ?>>Aladin</option>
            <option value="Aldrich" <?php if($heading_fonts == "Aldrich"){ echo "selected='selected'" ; } ?>>Aldrich</option>
            <option value="Alice" <?php if($heading_fonts == "Alice"){ echo "selected='selected'" ; } ?>>Alice</option>
            <option value="Alike+Angular" <?php if($heading_fonts == "Alike+Angular"){ echo "selected='selected'" ; } ?>>Alike Angular</option>
            <option value="Alike" <?php if($heading_fonts == "Alike"){ echo "selected='selected'" ; } ?>>Alike</option>
            <option value="Allan" <?php if($heading_fonts == "Allan"){ echo "selected='selected'" ; } ?>>Allan</option>
            <option value="Allerta+Stencil" <?php if($heading_fonts == "Allerta+Stencil"){ echo "selected='selected'" ; } ?>>Allerta Stencil</option>
            <option value="Allerta" <?php if($heading_fonts == "Allerta"){ echo "selected='selected'" ; } ?>>Allerta</option>
            <option value="Amaranth" <?php if($heading_fonts == "Amaranth"){ echo "selected='selected'" ; } ?>>Amaranth</option>
            <option value="Amatic+SC" <?php if($heading_fonts == "Amatic+SC"){ echo "selected='selected'" ; } ?>>Amatic SC</option>
            <option value="Andada" <?php if($heading_fonts == "Andada"){ echo "selected='selected'" ; } ?>>Andada</option>
            <option value="Andika" <?php if($heading_fonts == "Andika"){ echo "selected='selected'" ; } ?>>Andika</option>
            <option value="Annie+Use+Your+Telescope" <?php if($heading_fonts == "Annie+Use+Your+Telescope"){ echo "selected='selected'" ; } ?>>Annie Use Your Telescope</option>
            <option value="Anonymous+Pro" <?php if($heading_fonts == "Anonymous+Pro"){ echo "selected='selected'" ; } ?>>Anonymous Pro</option>
            <option value="Antic" <?php if($heading_fonts == "Antic"){ echo "selected='selected'" ; } ?>>Antic</option>
            <option value="Anton" <?php if($heading_fonts == "Anton"){ echo "selected='selected'" ; } ?>>Anton</option>
            <option value="Arapey" <?php if($heading_fonts == "Arapey"){ echo "selected='selected'" ; } ?>>Arapey</option>
            <option value="Architects+Daughter" <?php if($heading_fonts == "Architects+Daughter"){ echo "selected='selected'" ; } ?>>Architects Daughter</option>
            <option value="Arimo" <?php if($heading_fonts == "Arimo"){ echo "selected='selected'" ; } ?>>Arimo</option>
            <option value="Artifika" <?php if($heading_fonts == "Artifika"){ echo "selected='selected'" ; } ?>>Artifika</option>
            <option value="Arvo" <?php if($heading_fonts == "Arvo"){ echo "selected='selected'" ; } ?>>Arvo</option>
            <option value="Asset" <?php if($heading_fonts == "Asset"){ echo "selected='selected'" ; } ?>>Asset</option>
            <option value="Astloch" <?php if($heading_fonts == "Astloch"){ echo "selected='selected'" ; } ?>>Astloch</option>
            <option value="Atomic+Age" <?php if($heading_fonts == "Atomic+Age"){ echo "selected='selected'" ; } ?>>Atomic Age</option>
            <option value="Aubrey" <?php if($heading_fonts == "Aubrey"){ echo "selected='selected'" ; } ?>>Aubrey</option>
            <option value="Bangers" <?php if($heading_fonts == "Bangers"){ echo "selected='selected'" ; } ?>>Bangers</option>
            <option value="Bentham" <?php if($heading_fonts == "Bentham"){ echo "selected='selected'" ; } ?>>Bentham</option>
            <option value="Bevan" <?php if($heading_fonts == "Bevan"){ echo "selected='selected'" ; } ?>>Bevan</option>
            <option value="Bigshot+One" <?php if($heading_fonts == "Bigshot+One"){ echo "selected='selected'" ; } ?>>Bigshot One</option>
            <option value="Bitter" <?php if($heading_fonts == "Bitter"){ echo "selected='selected'" ; } ?>>Bitter</option>
            <option value="Black+Ops+One" <?php if($heading_fonts == "Black+Ops+One"){ echo "selected='selected'" ; } ?>>Black Ops One</option>
            <option value="Bowlby+One+SC" <?php if($heading_fonts == "Bowlby+One+SC"){ echo "selected='selected'" ; } ?>>Bowlby One SC</option>
            <option value="Bowlby+One" <?php if($heading_fonts == "Bowlby+One"){ echo "selected='selected'" ; } ?>>Bowlby One</option>
            <option value="Brawler" <?php if($heading_fonts == "Brawler"){ echo "selected='selected'" ; } ?>>Brawler</option>
            <option value="Bubblegum+Sans" <?php if($heading_fonts == "Bubblegum+Sans"){ echo "selected='selected'" ; } ?>>Bubblegum Sans</option>
            <option value="Buda" <?php if($heading_fonts == "Buda"){ echo "selected='selected'" ; } ?>>Buda</option>
            <option value="Butcherman+Caps" <?php if($heading_fonts == "Butcherman+Caps"){ echo "selected='selected'" ; } ?>>Butcherman Caps</option>
            <option value="Cabin+Condensed" <?php if($heading_fonts == "Cabin+Condensed"){ echo "selected='selected'" ; } ?>>Cabin Condensed</option>
            <option value="Cabin+Sketch" <?php if($heading_fonts == "Cabin+Sketch"){ echo "selected='selected'" ; } ?>>Cabin Sketch</option>
            <option value="Cabin" <?php if($heading_fonts == "Cabin"){ echo "selected='selected'" ; } ?>>Cabin</option>
            <option value="Cagliostro" <?php if($heading_fonts == "Cagliostro"){ echo "selected='selected'" ; } ?>>Cagliostro</option>
            <option value="Calligraffitti" <?php if($heading_fonts == "Calligraffitti"){ echo "selected='selected'" ; } ?>>Calligraffitti</option>
            <option value="Candal" <?php if($heading_fonts == "Candal"){ echo "selected='selected'" ; } ?>>Candal</option>
            <option value="Cantarell" <?php if($heading_fonts == "Cantarell"){ echo "selected='selected'" ; } ?>>Cantarell</option>
            <option value="Cardo" <?php if($heading_fonts == "Cardo"){ echo "selected='selected'" ; } ?>>Cardo</option>
            <option value="Carme" <?php if($heading_fonts == "Carme"){ echo "selected='selected'" ; } ?>>Carme</option>
            <option value="Carter+One" <?php if($heading_fonts == "Carter+One"){ echo "selected='selected'" ; } ?>>Carter One</option>
            <option value="Caudex" <?php if($heading_fonts == "Caudex"){ echo "selected='selected'" ; } ?>>Caudex</option>
            <option value="Cedarville+Cursive" <?php if($heading_fonts == "Cedarville+Cursive"){ echo "selected='selected'" ; } ?>>Cedarville Cursive</option>
            <option value="Changa+One" <?php if($heading_fonts == "Changa+One"){ echo "selected='selected'" ; } ?>>Changa One</option>
            <option value="Cherry+Cream+Soda" <?php if($heading_fonts == "Cherry+Cream+Soda"){ echo "selected='selected'" ; } ?>>Cherry Cream Soda</option>
            <option value="Chewy" <?php if($heading_fonts == "Chewy"){ echo "selected='selected'" ; } ?>>Chewy</option>
            <option value="Chicle" <?php if($heading_fonts == "Chicle"){ echo "selected='selected'" ; } ?>>Chicle</option>
            <option value="Chivo" <?php if($heading_fonts == "Chivo"){ echo "selected='selected'" ; } ?>>Chivo</option>
            <option value="Coda+Caption" <?php if($heading_fonts == "Coda+Caption"){ echo "selected='selected'" ; } ?>>Coda Caption</option>
            <option value="Coda" <?php if($heading_fonts == "Coda"){ echo "selected='selected'" ; } ?>>Coda</option>
            <option value="Comfortaa" <?php if($heading_fonts == "Comfortaa"){ echo "selected='selected'" ; } ?>>Comfortaa</option>
            <option value="Coming+Soon" <?php if($heading_fonts == "Coming+Soon"){ echo "selected='selected'" ; } ?>>Coming Soon</option>
            <option value="Contrail+One" <?php if($heading_fonts == "Contrail+One"){ echo "selected='selected'" ; } ?>>Contrail One</option>
            <option value="Convergence" <?php if($heading_fonts == "Convergence"){ echo "selected='selected'" ; } ?>>Convergence</option>
            <option value="Cookie" <?php if($heading_fonts == "Cookie"){ echo "selected='selected'" ; } ?>>Cookie</option>
            <option value="Copse" <?php if($heading_fonts == "Copse"){ echo "selected='selected'" ; } ?>>Copse</option>
            <option value="Corben" <?php if($heading_fonts == "Corben"){ echo "selected='selected'" ; } ?>>Corben</option>
            <option value="Cousine" <?php if($heading_fonts == "Cousine"){ echo "selected='selected'" ; } ?>>Cousine</option>
            <option value="Coustard" <?php if($heading_fonts == "Coustard"){ echo "selected='selected'" ; } ?>>Coustard</option>
            <option value="Covered+By+Your+Grace" <?php if($heading_fonts == "Covered+By+Your+Grace"){ echo "selected='selected'" ; } ?>>Covered By Your Grace</option>
            <option value="Crafty+Girls" <?php if($heading_fonts == "Crafty+Girls"){ echo "selected='selected'" ; } ?>>Crafty Girls</option>
            <option value="Creepster+Caps" <?php if($heading_fonts == "Creepster+Caps"){ echo "selected='selected'" ; } ?>>Creepster Caps</option>
            <option value="Crimson+Text" <?php if($heading_fonts == "Crimson+Text"){ echo "selected='selected'" ; } ?>>Crimson Text</option>
            <option value="Crushed" <?php if($heading_fonts == "Crushed"){ echo "selected='selected'" ; } ?>>Crushed</option>
            <option value="Cuprum" <?php if($heading_fonts == "Cuprum"){ echo "selected='selected'" ; } ?>>Cuprum</option>
            <option value="Damion" <?php if($heading_fonts == "Damion"){ echo "selected='selected'" ; } ?>>Damion</option>
            <option value="Dancing+Script" <?php if($heading_fonts == "Dancing+Script"){ echo "selected='selected'" ; } ?>>Dancing Script</option>
            <option value="Dawning+of+a+New+Day" <?php if($heading_fonts == "Dawning+of+a+New+Day"){ echo "selected='selected'" ; } ?>>Dawning of a New Day</option>
            <option value="Days+One" <?php if($heading_fonts == "Days+One"){ echo "selected='selected'" ; } ?>>Days One</option>
            <option value="Delius+Swash+Caps" <?php if($heading_fonts == "Delius+Swash+Caps"){ echo "selected='selected'" ; } ?>>Delius Swash Caps</option>
            <option value="Delius+Unicase" <?php if($heading_fonts == "Delius+Unicase"){ echo "selected='selected'" ; } ?>>Delius Unicase</option>
            <option value="Delius" <?php if($heading_fonts == "Delius"){ echo "selected='selected'" ; } ?>>Delius</option>
            <option value="Devonshire" <?php if($heading_fonts == "Devonshire"){ echo "selected='selected'" ; } ?>>Devonshire</option>
            <option value="Didact+Gothic" <?php if($heading_fonts == "Didact+Gothic"){ echo "selected='selected'" ; } ?>>Didact Gothic</option>
            <option value="Dorsa" <?php if($heading_fonts == "Dorsa"){ echo "selected='selected'" ; } ?>>Dorsa</option>
            <option value="Dr+Sugiyama" <?php if($heading_fonts == "Dr+Sugiyama"){ echo "selected='selected'" ; } ?>>Dr Sugiyama</option>
            <option value="Droid+Sans+Mono" <?php if($heading_fonts == "Droid+Sans+Mono"){ echo "selected='selected'" ; } ?>>Droid Sans Mono</option>
            <option value="Droid+Sans" <?php if($heading_fonts == "Droid+Sans"){ echo "selected='selected'" ; } ?>>Droid Sans</option>
            <option value="Droid+Serif" <?php if($heading_fonts == "Droid+Serif"){ echo "selected='selected'" ; } ?>>Droid Serif</option>
            <option value="EB+Garamond" <?php if($heading_fonts == "EB+Garamond"){ echo "selected='selected'" ; } ?>>EB Garamond</option>
            <option value="Eater+Caps" <?php if($heading_fonts == "Eater+Caps"){ echo "selected='selected'" ; } ?>>Eater Caps</option>
            <option value="Expletus+Sans" <?php if($heading_fonts == "Expletus+Sans"){ echo "selected='selected'" ; } ?>>Expletus Sans</option>
            <option value="Fanwood+Text" <?php if($heading_fonts == "Fanwood+Text"){ echo "selected='selected'" ; } ?>>Fanwood Text</option>
            <option value="Federant" <?php if($heading_fonts == "Federant"){ echo "selected='selected'" ; } ?>>Federant</option>
            <option value="Federo" <?php if($heading_fonts == "Federo"){ echo "selected='selected'" ; } ?>>Federo</option>
            <option value="Fjord+One" <?php if($heading_fonts == "Fjord+One"){ echo "selected='selected'" ; } ?>>Fjord One</option>
            <option value="Fondamento" <?php if($heading_fonts == "Fondamento"){ echo "selected='selected'" ; } ?>>Fondamento</option>
            <option value="Fontdiner+Swanky" <?php if($heading_fonts == "Fontdiner+Swanky"){ echo "selected='selected'" ; } ?>>Fontdiner Swanky</option>
            <option value="Forum" <?php if($heading_fonts == "Forum"){ echo "selected='selected'" ; } ?>>Forum</option>
            <option value="Francois+One" <?php if($heading_fonts == "Francois+One"){ echo "selected='selected'" ; } ?>>Francois One</option>
            <option value="Gentium+Basic" <?php if($heading_fonts == "Gentium+Basic"){ echo "selected='selected'" ; } ?>>Gentium Basic</option>
            <option value="Gentium+Book+Basic" <?php if($heading_fonts == "Gentium+Book+Basic"){ echo "selected='selected'" ; } ?>>Gentium Book Basic</option>
            <option value="Geo" <?php if($heading_fonts == "Geo"){ echo "selected='selected'" ; } ?>>Geo</option>
            <option value="Geostar+Fill" <?php if($heading_fonts == "Geostar+Fill"){ echo "selected='selected'" ; } ?>>Geostar Fill</option>
            <option value="Geostar" <?php if($heading_fonts == "Geostar"){ echo "selected='selected'" ; } ?>>Geostar</option>
            <option value="Give+You+Glory" <?php if($heading_fonts == "Give+You+Glory"){ echo "selected='selected'" ; } ?>>Give You Glory</option>
            <option value="Gloria+Hallelujah" <?php if($heading_fonts == "Gloria+Hallelujah"){ echo "selected='selected'" ; } ?>>Gloria Hallelujah</option>
            <option value="Goblin+One" <?php if($heading_fonts == "Goblin+One"){ echo "selected='selected'" ; } ?>>Goblin One</option>
            <option value="Gochi+Hand" <?php if($heading_fonts == "Gochi+Hand"){ echo "selected='selected'" ; } ?>>Gochi Hand</option>
            <option value="Goudy+Bookletter+1911" <?php if($heading_fonts == "Goudy+Bookletter+1911"){ echo "selected='selected'" ; } ?>>Goudy Bookletter 1911</option>
            <option value="Gravitas+One" <?php if($heading_fonts == "Gravitas+One"){ echo "selected='selected'" ; } ?>>Gravitas One</option>
            <option value="Gruppo" <?php if($heading_fonts == "Gruppo"){ echo "selected='selected'" ; } ?>>Gruppo</option>
            <option value="Hammersmith+One" <?php if($heading_fonts == "Hammersmith+One"){ echo "selected='selected'" ; } ?>>Hammersmith One</option>
            <option value="Herr+Von+Muellerhoff" <?php if($heading_fonts == "Herr+Von+Muellerhoff"){ echo "selected='selected'" ; } ?>>Herr Von Muellerhoff</option>
            <option value="Holtwood+One+SC" <?php if($heading_fonts == "Holtwood+One+SC"){ echo "selected='selected'" ; } ?>>Holtwood One SC</option>
            <option value="Homemade+Apple" <?php if($heading_fonts == "Homemade+Apple"){ echo "selected='selected'" ; } ?>>Homemade Apple</option>
            <option value="IM+Fell+DW+Pica+SC" <?php if($heading_fonts == "IM+Fell+DW+Pica+SC"){ echo "selected='selected'" ; } ?>>IM Fell DW Pica SC</option>
            <option value="IM+Fell+DW+Pica" <?php if($heading_fonts == "IM+Fell+DW+Pica"){ echo "selected='selected'" ; } ?>>IM Fell DW Pica</option>
            <option value="IM+Fell+Double+Pica+SC" <?php if($heading_fonts == "IM+Fell+Double+Pica+SC"){ echo "selected='selected'" ; } ?>>IM Fell Double Pica SC</option>
            <option value="IM+Fell+Double+Pica" <?php if($heading_fonts == "IM+Fell+Double+Pica"){ echo "selected='selected'" ; } ?>>IM Fell Double Pica</option>
            <option value="IM+Fell+English+SC" <?php if($heading_fonts == "IM+Fell+English+SC"){ echo "selected='selected'" ; } ?>>IM Fell English SC</option>
            <option value="IM+Fell+English" <?php if($heading_fonts == "IM+Fell+English"){ echo "selected='selected'" ; } ?>>IM Fell English</option>
            <option value="IM+Fell+French+Canon+SC" <?php if($heading_fonts == "IM+Fell+French+Canon+SC"){ echo "selected='selected'" ; } ?>>IM Fell French Canon SC</option>
            <option value="IM+Fell+French+Canon" <?php if($heading_fonts == "IM+Fell+French+Canon"){ echo "selected='selected'" ; } ?>>IM Fell French Canon</option>
            <option value="IM+Fell+Great+Primer+SC" <?php if($heading_fonts == "IM+Fell+Great+Primer+SC"){ echo "selected='selected'" ; } ?>>IM Fell Great Primer SC</option>
            <option value="IM+Fell+Great+Primer" <?php if($heading_fonts == "IM+Fell+Great+Primer"){ echo "selected='selected'" ; } ?>>IM Fell Great Primer</option>
            <option value="Iceland" <?php if($heading_fonts == "Iceland"){ echo "selected='selected'" ; } ?>>Iceland</option>
            <option value="Inconsolata" <?php if($heading_fonts == "Inconsolata"){ echo "selected='selected'" ; } ?>>Inconsolata</option>
            <option value="Indie+Flower" <?php if($heading_fonts == "Indie+Flower"){ echo "selected='selected'" ; } ?>>Indie Flower</option>
            <option value="Irish+Grover" <?php if($heading_fonts == "Irish+Grover"){ echo "selected='selected'" ; } ?>>Irish Grover</option>
            <option value="Istok+Web" <?php if($heading_fonts == "Istok+Web"){ echo "selected='selected'" ; } ?>>Istok Web</option>
            <option value="Jockey+One" <?php if($heading_fonts == "Jockey+One"){ echo "selected='selected'" ; } ?>>Jockey One</option>
            <option value="Josefin+Sans" <?php if($heading_fonts == "Josefin+Sans"){ echo "selected='selected'" ; } ?>>Josefin Sans</option>
            <option value="Josefin+Slab" <?php if($heading_fonts == "Josefin+Slab"){ echo "selected='selected'" ; } ?>>Josefin Slab</option>
            <option value="Judson" <?php if($heading_fonts == "Judson"){ echo "selected='selected'" ; } ?>>Judson</option>
            <option value="Julee" <?php if($heading_fonts == "Julee"){ echo "selected='selected'" ; } ?>>Julee</option>
            <option value="Jura" <?php if($heading_fonts == "Jura"){ echo "selected='selected'" ; } ?>>Jura</option>
            <option value="Just+Another+Hand" <?php if($heading_fonts == "Just+Another+Hand"){ echo "selected='selected'" ; } ?>>Just Another Hand</option>
            <option value="Just+Me+Again+Down+Here" <?php if($heading_fonts == "Just+Me+Again+Down+Here"){ echo "selected='selected'" ; } ?>>Just Me Again Down Here</option>
            <option value="Kameron" <?php if($heading_fonts == "Kameron"){ echo "selected='selected'" ; } ?>>Kameron</option>
            <option value="Kelly+Slab" <?php if($heading_fonts == "Kelly+Slab"){ echo "selected='selected'" ; } ?>>Kelly Slab</option>
            <option value="Kenia" <?php if($heading_fonts == "Kenia"){ echo "selected='selected'" ; } ?>>Kenia</option>
            <option value="Knewave" <?php if($heading_fonts == "Knewave"){ echo "selected='selected'" ; } ?>>Knewave</option>
            <option value="Kranky" <?php if($heading_fonts == "Kranky"){ echo "selected='selected'" ; } ?>>Kranky</option>
            <option value="Kreon" <?php if($heading_fonts == "Kreon"){ echo "selected='selected'" ; } ?>>Kreon</option>
            <option value="Kristi" <?php if($heading_fonts == "Kristi"){ echo "selected='selected'" ; } ?>>Kristi</option>
            <option value="La+Belle+Aurore" <?php if($heading_fonts == "La+Belle+Aurore"){ echo "selected='selected'" ; } ?>>La Belle Aurore</option>
            <option value="Lancelot" <?php if($heading_fonts == "Lancelot"){ echo "selected='selected'" ; } ?>>Lancelot</option>
            <option value="Lato" <?php if($heading_fonts == "Lato"){ echo "selected='selected'" ; } ?>>Lato</option>
            <option value="League+Script" <?php if($heading_fonts == "League+Script"){ echo "selected='selected'" ; } ?>>League Script</option>
            <option value="Leckerli+One" <?php if($heading_fonts == "Leckerli+One"){ echo "selected='selected'" ; } ?>>Leckerli One</option>
            <option value="Lekton" <?php if($heading_fonts == "Lekton"){ echo "selected='selected'" ; } ?>>Lekton</option>
            <option value="Lemon" <?php if($heading_fonts == "Lemon"){ echo "selected='selected'" ; } ?>>Lemon</option>
            <option value="Limelight" <?php if($heading_fonts == "Limelight"){ echo "selected='selected'" ; } ?>>Limelight</option>
            <option value="Linden+Hill" <?php if($heading_fonts == "Linden+Hill"){ echo "selected='selected'" ; } ?>>Linden Hill</option>
            <option value="Lobster+Two" <?php if($heading_fonts == "Lobster+Two"){ echo "selected='selected'" ; } ?>>Lobster Two</option>
            <option value="Lobster" <?php if($heading_fonts == "Lobster"){ echo "selected='selected'" ; } ?>>Lobster</option>
            <option value="Lora" <?php if($heading_fonts == "Lora"){ echo "selected='selected'" ; } ?>>Lora</option>
            <option value="Love+Ya+Like+A+Sister" <?php if($heading_fonts == "Love+Ya+Like+A+Sister"){ echo "selected='selected'" ; } ?>>Love Ya Like A Sister</option>
            <option value="Loved+by+the+King" <?php if($heading_fonts == "Loved+by+the+King"){ echo "selected='selected'" ; } ?>>Loved by the King</option>
            <option value="Luckiest+Guy" <?php if($heading_fonts == "Luckiest+Guy"){ echo "selected='selected'" ; } ?>>Luckiest Guy</option>
            <option value="Maiden+Orange" <?php if($heading_fonts == "Maiden+Orange"){ echo "selected='selected'" ; } ?>>Maiden Orange</option>
            <option value="Mako" <?php if($heading_fonts == "Mako"){ echo "selected='selected'" ; } ?>>Mako</option>
            <option value="Marck+Script" <?php if($heading_fonts == "Marck+Script"){ echo "selected='selected'" ; } ?>>Marck Script</option>
            <option value="Marvel" <?php if($heading_fonts == "Marvel"){ echo "selected='selected'" ; } ?>>Marvel</option>
            <option value="Mate+SC" <?php if($heading_fonts == "Mate+SC"){ echo "selected='selected'" ; } ?>>Mate SC</option>
            <option value="Mate" <?php if($heading_fonts == "Mate"){ echo "selected='selected'" ; } ?>>Mate</option>
            <option value="Maven+Pro" <?php if($heading_fonts == "Maven+Pro"){ echo "selected='selected'" ; } ?>>Maven Pro</option>
            <option value="Meddon" <?php if($heading_fonts == "Meddon"){ echo "selected='selected'" ; } ?>>Meddon</option>
            <option value="MedievalSharp" <?php if($heading_fonts == "MedievalSharp"){ echo "selected='selected'" ; } ?>>MedievalSharp</option>
            <option value="Megrim" <?php if($heading_fonts == "Megrim"){ echo "selected='selected'" ; } ?>>Megrim</option>
            <option value="Merienda+One" <?php if($heading_fonts == "Merienda+One"){ echo "selected='selected'" ; } ?>>Merienda One</option>
            <option value="Merriweather" <?php if($heading_fonts == "Merriweather"){ echo "selected='selected'" ; } ?>>Merriweather</option>
            <option value="Metrophobic" <?php if($heading_fonts == "Metrophobic"){ echo "selected='selected'" ; } ?>>Metrophobic</option>
            <option value="Michroma" <?php if($heading_fonts == "Michroma"){ echo "selected='selected'" ; } ?>>Michroma</option>
            <option value="Miltonian+Tattoo" <?php if($heading_fonts == "Miltonian+Tattoo"){ echo "selected='selected'" ; } ?>>Miltonian Tattoo</option>
            <option value="Miltonian" <?php if($heading_fonts == "Miltonian"){ echo "selected='selected'" ; } ?>>Miltonian</option>
            <option value="Miss+Fajardose" <?php if($heading_fonts == "Miss+Fajardose"){ echo "selected='selected'" ; } ?>>Miss Fajardose</option>
            <option value="Miss+Saint+Delafield" <?php if($heading_fonts == "Miss+Saint+Delafield"){ echo "selected='selected'" ; } ?>>Miss Saint Delafield</option>
            <option value="Modern+Antiqua" <?php if($heading_fonts == "Modern+Antiqua"){ echo "selected='selected'" ; } ?>>Modern Antiqua</option>
            <option value="Molengo" <?php if($heading_fonts == "Molengo"){ echo "selected='selected'" ; } ?>>Molengo</option>
            <option value="Monofett" <?php if($heading_fonts == "Monofett"){ echo "selected='selected'" ; } ?>>Monofett</option>
            <option value="Monoton" <?php if($heading_fonts == "Monoton"){ echo "selected='selected'" ; } ?>>Monoton</option>
            <option value="Monsieur+La+Doulaise" <?php if($heading_fonts == "Monsieur+La+Doulaise"){ echo "selected='selected'" ; } ?>>Monsieur La Doulaise</option>
            <option value="Montez" <?php if($heading_fonts == "Montez"){ echo "selected='selected'" ; } ?>>Montez</option>
            <option value="Montserrat" <?php if($heading_fonts == "Montserrat"){ echo "selected='selected'" ; } ?>>Montserrat</option>
            <option value="Mountains+of+Christmas" <?php if($heading_fonts == "Mountains+of+Christmas"){ echo "selected='selected'" ; } ?>>Mountains of Christmas</option>
            <option value="Mr+Bedford" <?php if($heading_fonts == "Mr+Bedford"){ echo "selected='selected'" ; } ?>>Mr Bedford</option>
            <option value="Mr+Dafoe" <?php if($heading_fonts == "Mr+Dafoe"){ echo "selected='selected'" ; } ?>>Mr Dafoe</option>
            <option value="Mr+De+Haviland" <?php if($heading_fonts == "Mr+De+Haviland"){ echo "selected='selected'" ; } ?>>Mr De Haviland</option>
            <option value="Mrs+Sheppards" <?php if($heading_fonts == "Mrs+Sheppards"){ echo "selected='selected'" ; } ?>>Mrs Sheppards</option>
            <option value="Muli" <?php if($heading_fonts == "Muli"){ echo "selected='selected'" ; } ?>>Muli</option>
            <option value="Neucha" <?php if($heading_fonts == "Neucha"){ echo "selected='selected'" ; } ?>>Neucha</option>
            <option value="Neuton" <?php if($heading_fonts == "Neuton"){ echo "selected='selected'" ; } ?>>Neuton</option>
            <option value="News+Cycle" <?php if($heading_fonts == "News+Cycle"){ echo "selected='selected'" ; } ?>>News Cycle</option>
            <option value="Niconne" <?php if($heading_fonts == "Niconne"){ echo "selected='selected'" ; } ?>>Niconne</option>
            <option value="Nixie+One" <?php if($heading_fonts == "Nixie+One"){ echo "selected='selected'" ; } ?>>Nixie One</option>
            <option value="Nobile" <?php if($heading_fonts == "Nobile"){ echo "selected='selected'" ; } ?>>Nobile</option>
            <option value="Nosifer+Caps" <?php if($heading_fonts == "Nosifer+Caps"){ echo "selected='selected'" ; } ?>>Nosifer Caps</option>
            <option value="Nothing+You+Could+Do" <?php if($heading_fonts == "Nothing+You+Could+Do"){ echo "selected='selected'" ; } ?>>Nothing You Could Do</option>
            <option value="Nova+Cut" <?php if($heading_fonts == "Nova+Cut"){ echo "selected='selected'" ; } ?>>Nova Cut</option>
            <option value="Nova+Flat" <?php if($heading_fonts == "Nova+Flat"){ echo "selected='selected'" ; } ?>>Nova Flat</option>
            <option value="Nova+Mono" <?php if($heading_fonts == "Nova+Mono"){ echo "selected='selected'" ; } ?>>Nova Mono</option>
            <option value="Nova+Oval" <?php if($heading_fonts == "Nova+Oval"){ echo "selected='selected'" ; } ?>>Nova Oval</option>
            <option value="Nova+Round" <?php if($heading_fonts == "Nova+Round"){ echo "selected='selected'" ; } ?>>Nova Round</option>
            <option value="Nova+Script" <?php if($heading_fonts == "Nova+Script"){ echo "selected='selected'" ; } ?>>Nova Script</option>
            <option value="Nova+Slim" <?php if($heading_fonts == "Nova+Slim"){ echo "selected='selected'" ; } ?>>Nova Slim</option>
            <option value="Nova+Square" <?php if($heading_fonts == "Nova+Square"){ echo "selected='selected'" ; } ?>>Nova Square</option>
            <option value="Numans" <?php if($heading_fonts == "Numans"){ echo "selected='selected'" ; } ?>>Numans</option>
            <option value="Nunito" <?php if($heading_fonts == "Nunito"){ echo "selected='selected'" ; } ?>>Nunito</option>
            <option value="Old+Standard+TT" <?php if($heading_fonts == "Old+Standard+TT"){ echo "selected='selected'" ; } ?>>Old Standard TT</option>
            <option value="Open+Sans+Condensed" <?php if($heading_fonts == "Open+Sans+Condensed"){ echo "selected='selected'" ; } ?>>Open Sans Condensed</option>
            <option value="Open+Sans" <?php if($heading_fonts == "Open+Sans"){ echo "selected='selected'" ; } ?>>Open Sans</option>
            <option value="Orbitron" <?php if($heading_fonts == "Orbitron"){ echo "selected='selected'" ; } ?>>Orbitron</option>
            <option value="Oswald" <?php if($heading_fonts == "Oswald"){ echo "selected='selected'" ; } ?>>Oswald</option>
            <option value="Over+the+Rainbow" <?php if($heading_fonts == "Over+the+Rainbow"){ echo "selected='selected'" ; } ?>>Over the Rainbow</option>
            <option value="Ovo" <?php if($heading_fonts == "Ovo"){ echo "selected='selected'" ; } ?>>Ovo</option>
            <option value="PT+Sans+Caption" <?php if($heading_fonts == "PT+Sans+Caption"){ echo "selected='selected'" ; } ?>>PT Sans Caption</option>
            <option value="PT+Sans+Narrow" <?php if($heading_fonts == "PT+Sans+Narrow"){ echo "selected='selected'" ; } ?>>PT Sans Narrow</option>
            <option value="PT+Sans" <?php if($heading_fonts == "PT+Sans"){ echo "selected='selected'" ; } ?>>PT Sans</option>
            <option value="PT+Serif+Caption" <?php if($heading_fonts == "PT+Serif+Caption"){ echo "selected='selected'" ; } ?>>PT Serif Caption</option>
            <option value="PT+Serif" <?php if($heading_fonts == "PT+Serif"){ echo "selected='selected'" ; } ?>>PT Serif</option>
            <option value="Pacifico" <?php if($heading_fonts == "Pacifico"){ echo "selected='selected'" ; } ?>>Pacifico</option>
            <option value="Passero+One" <?php if($heading_fonts == "Passero+One"){ echo "selected='selected'" ; } ?>>Passero One</option>
            <option value="Patrick+Hand" <?php if($heading_fonts == "Patrick+Hand"){ echo "selected='selected'" ; } ?>>Patrick Hand</option>
            <option value="Paytone+One" <?php if($heading_fonts == "Paytone+One"){ echo "selected='selected'" ; } ?>>Paytone One</option>
            <option value="Permanent+Marker" <?php if($heading_fonts == "Permanent+Marker"){ echo "selected='selected'" ; } ?>>Permanent Marker</option>
            <option value="Petrona" <?php if($heading_fonts == "Petrona"){ echo "selected='selected'" ; } ?>>Petrona</option>
            <option value="Philosopher" <?php if($heading_fonts == "Philosopher"){ echo "selected='selected'" ; } ?>>Philosopher</option>
            <option value="Piedra" <?php if($heading_fonts == "Piedra"){ echo "selected='selected'" ; } ?>>Piedra</option>
            <option value="Pinyon+Script" <?php if($heading_fonts == "Pinyon+Script"){ echo "selected='selected'" ; } ?>>Pinyon Script</option>
            <option value="Play" <?php if($heading_fonts == "Play"){ echo "selected='selected'" ; } ?>>Play</option>
            <option value="Playfair+Display" <?php if($heading_fonts == "Playfair+Display"){ echo "selected='selected'" ; } ?>>Playfair Display</option>
            <option value="Podkova" <?php if($heading_fonts == "Podkova"){ echo "selected='selected'" ; } ?>>Podkova</option>
            <option value="Poller+One" <?php if($heading_fonts == "Poller+One"){ echo "selected='selected'" ; } ?>>Poller One</option>
            <option value="Poly" <?php if($heading_fonts == "Poly"){ echo "selected='selected'" ; } ?>>Poly</option>
            <option value="Pompiere" <?php if($heading_fonts == "Pompiere"){ echo "selected='selected'" ; } ?>>Pompiere</option>
            <option value="Prata" <?php if($heading_fonts == "Prata"){ echo "selected='selected'" ; } ?>>Prata</option>
            <option value="Prociono" <?php if($heading_fonts == "Prociono"){ echo "selected='selected'" ; } ?>>Prociono</option>
            <option value="Puritan" <?php if($heading_fonts == "Puritan"){ echo "selected='selected'" ; } ?>>Puritan</option>
            <option value="Quattrocento+Sans" <?php if($heading_fonts == "Quattrocento+Sans"){ echo "selected='selected'" ; } ?>>Quattrocento Sans</option>
            <option value="Quattrocento" <?php if($heading_fonts == "Quattrocento"){ echo "selected='selected'" ; } ?>>Quattrocento</option>
            <option value="Questrial" <?php if($heading_fonts == "Questrial"){ echo "selected='selected'" ; } ?>>Questrial</option>
            <option value="Quicksand" <?php if($heading_fonts == "Quicksand"){ echo "selected='selected'" ; } ?>>Quicksand</option>
            <option value="Radley" <?php if($heading_fonts == "Radley"){ echo "selected='selected'" ; } ?>>Radley</option>
            <option value="Raleway" <?php if($heading_fonts == "Raleway"){ echo "selected='selected'" ; } ?>>Raleway</option>
            <option value="Rammetto+One" <?php if($heading_fonts == "Rammetto+One"){ echo "selected='selected'" ; } ?>>Rammetto One</option>
            <option value="Rancho" <?php if($heading_fonts == "Rancho"){ echo "selected='selected'" ; } ?>>Rancho</option>
            <option value="Rationale" <?php if($heading_fonts == "Rationale"){ echo "selected='selected'" ; } ?>>Rationale</option>
            <option value="Redressed" <?php if($heading_fonts == "Redressed"){ echo "selected='selected'" ; } ?>>Redressed</option>
            <option value="Reenie+Beanie" <?php if($heading_fonts == "Reenie+Beanie"){ echo "selected='selected'" ; } ?>>Reenie Beanie</option>
            <option value="Ribeye+Marrow" <?php if($heading_fonts == "Ribeye+Marrow"){ echo "selected='selected'" ; } ?>>Ribeye Marrow</option>
            <option value="Ribeye" <?php if($heading_fonts == "Ribeye"){ echo "selected='selected'" ; } ?>>Ribeye</option>
            <option value="Righteous" <?php if($heading_fonts == "Righteous"){ echo "selected='selected'" ; } ?>>Righteous</option>
            <option value="Rochester" <?php if($heading_fonts == "Rochester"){ echo "selected='selected'" ; } ?>>Rochester</option>
            <option value="Rock+Salt" <?php if($heading_fonts == "Rock+Salt"){ echo "selected='selected'" ; } ?>>Rock Salt</option>
            <option value="Rokkitt" <?php if($heading_fonts == "Rokkitt"){ echo "selected='selected'" ; } ?>>Rokkitt</option>
            <option value="Rosario" <?php if($heading_fonts == "Rosario"){ echo "selected='selected'" ; } ?>>Rosario</option>
            <option value="Ruslan+Display" <?php if($heading_fonts == "Ruslan+Display"){ echo "selected='selected'" ; } ?>>Ruslan Display</option>
            <option value="Salsa" <?php if($heading_fonts == "Salsa"){ echo "selected='selected'" ; } ?>>Salsa</option>
            <option value="Sancreek" <?php if($heading_fonts == "Sancreek"){ echo "selected='selected'" ; } ?>>Sancreek</option>
            <option value="Sansita+One" <?php if($heading_fonts == "Sansita+One"){ echo "selected='selected'" ; } ?>>Sansita One</option>
            <option value="Satisfy" <?php if($heading_fonts == "Satisfy"){ echo "selected='selected'" ; } ?>>Satisfy</option>
            <option value="Schoolbell" <?php if($heading_fonts == "Schoolbell"){ echo "selected='selected'" ; } ?>>Schoolbell</option>
            <option value="Shadows+Into+Light" <?php if($heading_fonts == "Shadows+Into+Light"){ echo "selected='selected'" ; } ?>>Shadows Into Light</option>
            <option value="Shanti" <?php if($heading_fonts == "Shanti"){ echo "selected='selected'" ; } ?>>Shanti</option>
            <option value="Short+Stack" <?php if($heading_fonts == "Short+Stack"){ echo "selected='selected'" ; } ?>>Short Stack</option>
            <option value="Sigmar+One" <?php if($heading_fonts == "Sigmar+One"){ echo "selected='selected'" ; } ?>>Sigmar One</option>
            <option value="Signika+Negative" <?php if($heading_fonts == "Signika+Negative"){ echo "selected='selected'" ; } ?>>Signika Negative</option>
            <option value="Signika" <?php if($heading_fonts == "Signika"){ echo "selected='selected'" ; } ?>>Signika</option>
            <option value="Six+Caps" <?php if($heading_fonts == "Six+Caps"){ echo "selected='selected'" ; } ?>>Six Caps</option>
            <option value="Slackey" <?php if($heading_fonts == "Slackey"){ echo "selected='selected'" ; } ?>>Slackey</option>
            <option value="Smokum" <?php if($heading_fonts == "Smokum"){ echo "selected='selected'" ; } ?>>Smokum</option>
            <option value="Smythe" <?php if($heading_fonts == "Smythe"){ echo "selected='selected'" ; } ?>>Smythe</option>
            <option value="Sniglet" <?php if($heading_fonts == "Sniglet"){ echo "selected='selected'" ; } ?>>Sniglet</option>
            <option value="Snippet" <?php if($heading_fonts == "Snippet"){ echo "selected='selected'" ; } ?>>Snippet</option>
            <option value="Sorts+Mill+Goudy" <?php if($heading_fonts == "Sorts+Mill+Goudy"){ echo "selected='selected'" ; } ?>>Sorts Mill Goudy</option>
            <option value="Special+Elite" <?php if($heading_fonts == "Special+Elite"){ echo "selected='selected'" ; } ?>>Special Elite</option>
            <option value="Spinnaker" <?php if($heading_fonts == "Spinnaker"){ echo "selected='selected'" ; } ?>>Spinnaker</option>
            <option value="Spirax" <?php if($heading_fonts == "Spirax"){ echo "selected='selected'" ; } ?>>Spirax</option>
            <option value="Stardos+Stencil" <?php if($heading_fonts == "Stardos+Stencil"){ echo "selected='selected'" ; } ?>>Stardos Stencil</option>
            <option value="Sue+Ellen+Francisco" <?php if($heading_fonts == "Sue+Ellen+Francisco"){ echo "selected='selected'" ; } ?>>Sue Ellen Francisco</option>
            <option value="Sunshiney" <?php if($heading_fonts == "Sunshiney"){ echo "selected='selected'" ; } ?>>Sunshiney</option>
            <option value="Supermercado+One" <?php if($heading_fonts == "Supermercado+One"){ echo "selected='selected'" ; } ?>>Supermercado One</option>
            <option value="Swanky+and+Moo+Moo" <?php if($heading_fonts == "Swanky+and+Moo+Moo"){ echo "selected='selected'" ; } ?>>Swanky and Moo Moo</option>
            <option value="Syncopate" <?php if($heading_fonts == "Syncopate"){ echo "selected='selected'" ; } ?>>Syncopate</option>
            <option value="Tangerine" <?php if($heading_fonts == "Tangerine"){ echo "selected='selected'" ; } ?>>Tangerine</option>
            <option value="Tenor+Sans" <?php if($heading_fonts == "Tenor+Sans"){ echo "selected='selected'" ; } ?>>Tenor Sans</option>
            <option value="Terminal+Dosis" <?php if($heading_fonts == "Terminal+Dosis"){ echo "selected='selected'" ; } ?>>Terminal Dosis</option>
            <option value="The+Girl+Next+Door" <?php if($heading_fonts == "The+Girl+Next+Door"){ echo "selected='selected'" ; } ?>>The Girl Next Door</option>
            <option value="Tienne" <?php if($heading_fonts == "Tienne"){ echo "selected='selected'" ; } ?>>Tienne</option>
            <option value="Tinos" <?php if($heading_fonts == "Tinos"){ echo "selected='selected'" ; } ?>>Tinos</option>
            <option value="Tulpen+One" <?php if($heading_fonts == "Tulpen+One"){ echo "selected='selected'" ; } ?>>Tulpen One</option>
            <option value="Ubuntu+Condensed" <?php if($heading_fonts == "Ubuntu+Condensed"){ echo "selected='selected'" ; } ?>>Ubuntu Condensed</option>
            <option value="Ubuntu+Mono" <?php if($heading_fonts == "Ubuntu+Mono"){ echo "selected='selected'" ; } ?>>Ubuntu Mono</option>
            <option value="Ubuntu" <?php if($heading_fonts == "Ubuntu"){ echo "selected='selected'" ; } ?>>Ubuntu</option>
            <option value="Ultra" <?php if($heading_fonts == "Ultra"){ echo "selected='selected'" ; } ?>>Ultra</option>
            <option value="UnifrakturCook" <?php if($heading_fonts == "UnifrakturCook"){ echo "selected='selected'" ; } ?>>UnifrakturCook</option>
            <option value="UnifrakturMaguntia" <?php if($heading_fonts == "UnifrakturMaguntia"){ echo "selected='selected'" ; } ?>>UnifrakturMaguntia</option>
            <option value="Unkempt" <?php if($heading_fonts == "Unkempt"){ echo "selected='selected'" ; } ?>>Unkempt</option>
            <option value="Unlock" <?php if($heading_fonts == "Unlock"){ echo "selected='selected'" ; } ?>>Unlock</option>
            <option value="Unna" <?php if($heading_fonts == "Unna"){ echo "selected='selected'" ; } ?>>Unna</option>
            <option value="VT323" <?php if($heading_fonts == "VT323"){ echo "selected='selected'" ; } ?>>VT323</option>
            <option value="Varela+Round" <?php if($heading_fonts == "Varela+Round"){ echo "selected='selected'" ; } ?>>Varela Round</option>
            <option value="Varela" <?php if($heading_fonts == "Varela"){ echo "selected='selected'" ; } ?>>Varela</option>
            <option value="Vast+Shadow" <?php if($heading_fonts == "Vast+Shadow"){ echo "selected='selected'" ; } ?>>Vast Shadow</option>
            <option value="Vibur" <?php if($heading_fonts == "Vibur"){ echo "selected='selected'" ; } ?>>Vibur</option>
            <option value="Vidaloka" <?php if($heading_fonts == "Vidaloka"){ echo "selected='selected'" ; } ?>>Vidaloka</option>
            <option value="Volkhov" <?php if($heading_fonts == "Volkhov"){ echo "selected='selected'" ; } ?>>Volkhov</option>
            <option value="Vollkorn" <?php if($heading_fonts == "Vollkorn"){ echo "selected='selected'" ; } ?>>Vollkorn</option>
            <option value="Voltaire" <?php if($heading_fonts == "Voltaire"){ echo "selected='selected'" ; } ?>>Voltaire</option>
            <option value="Waiting+for+the+Sunrise" <?php if($heading_fonts == "Waiting+for+the+Sunrise"){ echo "selected='selected'" ; } ?>>Waiting for the Sunrise</option>
            <option value="Wallpoet" <?php if($heading_fonts == "Wallpoet"){ echo "selected='selected'" ; } ?>>Wallpoet</option>
            <option value="Walter+Turncoat" <?php if($heading_fonts == "Walter+Turncoat"){ echo "selected='selected'" ; } ?>>Walter Turncoat</option>
            <option value="Wire+One" <?php if($heading_fonts == "Wire+One"){ echo "selected='selected'" ; } ?>>Wire One</option>
            <option value="Yanone+Kaffeesatz" <?php if($heading_fonts == "Yanone+Kaffeesatz"){ echo "selected='selected'" ; } ?>>Yanone Kaffeesatz</option>
            <option value="Yellowtail" <?php if($heading_fonts == "Yellowtail"){ echo "selected='selected'" ; } ?>>Yellowtail</option>
            <option value="Yeseva+One" <?php if($heading_fonts == "Yeseva+One"){ echo "selected='selected'" ; } ?>>Yeseva One</option>
            <option value="Zeyada" <?php if($heading_fonts == "Zeyada"){ echo "selected='selected'" ; } ?>>Zeyada</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('RTL view', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <div class="form-label-checkbox">
            <input type="checkbox" class="switch" name="rtl_view" value="1" <?php echo (osc_esc_html( osc_get_preference('rtl_view', 'osclasswizards_theme') ) == "1")? "checked": ""; ?>>
            <br>
            <div class="help-box">
              <?php _e('Right to left view.', OSCLASSWIZARDS_THEME_FOLDER); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-label">
          <?php _e('Custom CSS', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <textarea style="height: 115px; width: 500px;"name="custom_css"><?php echo osc_esc_html( osc_get_preference('custom_css', 'osclasswizards_theme') ); ?></textarea>
          <br/>
          <br/>
          <div class="help-box">
            <?php _e('You can write your custom CSS and override the default CSS.', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </div>
        </div>
      </div>
      <div class="form-actions">
        <input id="button" type="submit" value="<?php echo osc_esc_html(__('Save changes',OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit">
      </div>
    </div>
  </fieldset>
</form>
