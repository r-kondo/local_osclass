<?php 
/**
* Admin menu page for Theme Colors settings
*
*/
?>

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<?php $colorMode = osc_get_preference('theme_color_mode', 'osclasswizards_theme');?>
<?php $google_fonts = osc_get_preference('google_fonts', 'osclasswizards_theme');?>
<h2 class="render-title"><?php _e('Theme Style', OSCLASSWIZARDS_THEME_FOLDER); ?></h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
    <input type="hidden" name="action_specific" value="theme_style" />
	<fieldset>
		<div class="form-horizontal">
			<div class="form-row">
                <div class="form-label"><?php _e('Theme color mode', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <select name="theme_color_mode">
                        <option value="green" <?php if($colorMode == 'green'){ echo 'selected="selected"' ; } ?>><?php echo osc_esc_html(__('Green',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                        <option value="dark-green" <?php if($colorMode == 'dark-green'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Dark Green',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                        <option value="red" <?php if($colorMode == 'red'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Red',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                        <option value="vivid-red" <?php if($colorMode == 'vivid-red'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Vivid Red',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                        <option value="blue" <?php if($colorMode == 'blue'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Blue',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                        <option value="light-blue" <?php if($colorMode == 'light-blue'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Light Blue',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                        <option value="orange" <?php if($colorMode == 'orange'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Orange',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                        <option value="gray" <?php if($colorMode == 'gray'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Gray',OSCLASSWIZARDS_THEME_FOLDER));?></option>
					    <option value="purple" <?php if($colorMode == 'purple'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Purple',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                        <option value="yellow" <?php if($colorMode == 'yellow'){ echo 'selected="selected"' ; } ?>><?php  echo osc_esc_html(__('Yellow',OSCLASSWIZARDS_THEME_FOLDER));?></option>
                    </select>
                </div>
			</div>
			<div class="form-row">
                <div class="form-label"><?php _e('Google fonts', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <select name="google_fonts">
						<option value="Abel" <?php if($google_fonts == "Abel"){ echo "selected='selected'" ; } ?>>Abel</option>
						<option value="Abril+Fatface" <?php if($google_fonts == "Abril+Fatface"){ echo "selected='selected'" ; } ?>>Abril Fatface</option>
						<option value="Aclonica" <?php if($google_fonts == "Aclonica"){ echo "selected='selected'" ; } ?>>Aclonica</option>
						<option value="Actor" <?php if($google_fonts == "Actor"){ echo "selected='selected'" ; } ?>>Actor</option>
						<option value="Adamina" <?php if($google_fonts == "Adamina"){ echo "selected='selected'" ; } ?>>Adamina</option>
						<option value="Aguafina+Script" <?php if($google_fonts == "Aguafina+Script"){ echo "selected='selected'" ; } ?>>Aguafina Script</option>
						<option value="Aladin" <?php if($google_fonts == "Aladin"){ echo "selected='selected'" ; } ?>>Aladin</option>
						<option value="Aldrich" <?php if($google_fonts == "Aldrich"){ echo "selected='selected'" ; } ?>>Aldrich</option>
						<option value="Alice" <?php if($google_fonts == "Alice"){ echo "selected='selected'" ; } ?>>Alice</option>
						<option value="Alike+Angular" <?php if($google_fonts == "Alike+Angular"){ echo "selected='selected'" ; } ?>>Alike Angular</option>
						<option value="Alike" <?php if($google_fonts == "Alike"){ echo "selected='selected'" ; } ?>>Alike</option>
						<option value="Allan" <?php if($google_fonts == "Allan"){ echo "selected='selected'" ; } ?>>Allan</option>
						<option value="Allerta+Stencil" <?php if($google_fonts == "Allerta+Stencil"){ echo "selected='selected'" ; } ?>>Allerta Stencil</option>
						<option value="Allerta" <?php if($google_fonts == "Allerta"){ echo "selected='selected'" ; } ?>>Allerta</option>
						<option value="Amaranth" <?php if($google_fonts == "Amaranth"){ echo "selected='selected'" ; } ?>>Amaranth</option>
						<option value="Amatic+SC" <?php if($google_fonts == "Amatic+SC"){ echo "selected='selected'" ; } ?>>Amatic SC</option>
						<option value="Andada" <?php if($google_fonts == "Andada"){ echo "selected='selected'" ; } ?>>Andada</option>
						<option value="Andika" <?php if($google_fonts == "Andika"){ echo "selected='selected'" ; } ?>>Andika</option>
						<option value="Annie+Use+Your+Telescope" <?php if($google_fonts == "Annie+Use+Your+Telescope"){ echo "selected='selected'" ; } ?>>Annie Use Your Telescope</option>
						<option value="Anonymous+Pro" <?php if($google_fonts == "Anonymous+Pro"){ echo "selected='selected'" ; } ?>>Anonymous Pro</option>
						<option value="Antic" <?php if($google_fonts == "Antic"){ echo "selected='selected'" ; } ?>>Antic</option>
						<option value="Anton" <?php if($google_fonts == "Anton"){ echo "selected='selected'" ; } ?>>Anton</option>
						<option value="Arapey" <?php if($google_fonts == "Arapey"){ echo "selected='selected'" ; } ?>>Arapey</option>
						<option value="Architects+Daughter" <?php if($google_fonts == "Architects+Daughter"){ echo "selected='selected'" ; } ?>>Architects Daughter</option>
						<option value="Arimo" <?php if($google_fonts == "Arimo"){ echo "selected='selected'" ; } ?>>Arimo</option>
						<option value="Artifika" <?php if($google_fonts == "Artifika"){ echo "selected='selected'" ; } ?>>Artifika</option>
						<option value="Arvo" <?php if($google_fonts == "Arvo"){ echo "selected='selected'" ; } ?>>Arvo</option>
						<option value="Asset" <?php if($google_fonts == "Asset"){ echo "selected='selected'" ; } ?>>Asset</option>
						<option value="Astloch" <?php if($google_fonts == "Astloch"){ echo "selected='selected'" ; } ?>>Astloch</option>
						<option value="Atomic+Age" <?php if($google_fonts == "Atomic+Age"){ echo "selected='selected'" ; } ?>>Atomic Age</option>
						<option value="Aubrey" <?php if($google_fonts == "Aubrey"){ echo "selected='selected'" ; } ?>>Aubrey</option>
						<option value="Bangers" <?php if($google_fonts == "Bangers"){ echo "selected='selected'" ; } ?>>Bangers</option>
						<option value="Bentham" <?php if($google_fonts == "Bentham"){ echo "selected='selected'" ; } ?>>Bentham</option>
						<option value="Bevan" <?php if($google_fonts == "Bevan"){ echo "selected='selected'" ; } ?>>Bevan</option>
						<option value="Bigshot+One" <?php if($google_fonts == "Bigshot+One"){ echo "selected='selected'" ; } ?>>Bigshot One</option>
						<option value="Bitter" <?php if($google_fonts == "Bitter"){ echo "selected='selected'" ; } ?>>Bitter</option>
						<option value="Black+Ops+One" <?php if($google_fonts == "Black+Ops+One"){ echo "selected='selected'" ; } ?>>Black Ops One</option>
						<option value="Bowlby+One+SC" <?php if($google_fonts == "Bowlby+One+SC"){ echo "selected='selected'" ; } ?>>Bowlby One SC</option>
						<option value="Bowlby+One" <?php if($google_fonts == "Bowlby+One"){ echo "selected='selected'" ; } ?>>Bowlby One</option>
						<option value="Brawler" <?php if($google_fonts == "Brawler"){ echo "selected='selected'" ; } ?>>Brawler</option>
						<option value="Bubblegum+Sans" <?php if($google_fonts == "Bubblegum+Sans"){ echo "selected='selected'" ; } ?>>Bubblegum Sans</option>
						<option value="Buda" <?php if($google_fonts == "Buda"){ echo "selected='selected'" ; } ?>>Buda</option>
						<option value="Butcherman+Caps" <?php if($google_fonts == "Butcherman+Caps"){ echo "selected='selected'" ; } ?>>Butcherman Caps</option>
						<option value="Cabin+Condensed" <?php if($google_fonts == "Cabin+Condensed"){ echo "selected='selected'" ; } ?>>Cabin Condensed</option>
						<option value="Cabin+Sketch" <?php if($google_fonts == "Cabin+Sketch"){ echo "selected='selected'" ; } ?>>Cabin Sketch</option>
						<option value="Cabin" <?php if($google_fonts == "Cabin"){ echo "selected='selected'" ; } ?>>Cabin</option>
						<option value="Cagliostro" <?php if($google_fonts == "Cagliostro"){ echo "selected='selected'" ; } ?>>Cagliostro</option>
						<option value="Calligraffitti" <?php if($google_fonts == "Calligraffitti"){ echo "selected='selected'" ; } ?>>Calligraffitti</option>
						<option value="Candal" <?php if($google_fonts == "Candal"){ echo "selected='selected'" ; } ?>>Candal</option>
						<option value="Cantarell" <?php if($google_fonts == "Cantarell"){ echo "selected='selected'" ; } ?>>Cantarell</option>
						<option value="Cardo" <?php if($google_fonts == "Cardo"){ echo "selected='selected'" ; } ?>>Cardo</option>
						<option value="Carme" <?php if($google_fonts == "Carme"){ echo "selected='selected'" ; } ?>>Carme</option>
						<option value="Carter+One" <?php if($google_fonts == "Carter+One"){ echo "selected='selected'" ; } ?>>Carter One</option>
						<option value="Caudex" <?php if($google_fonts == "Caudex"){ echo "selected='selected'" ; } ?>>Caudex</option>
						<option value="Cedarville+Cursive" <?php if($google_fonts == "Cedarville+Cursive"){ echo "selected='selected'" ; } ?>>Cedarville Cursive</option>
						<option value="Changa+One" <?php if($google_fonts == "Changa+One"){ echo "selected='selected'" ; } ?>>Changa One</option>
						<option value="Cherry+Cream+Soda" <?php if($google_fonts == "Cherry+Cream+Soda"){ echo "selected='selected'" ; } ?>>Cherry Cream Soda</option>
						<option value="Chewy" <?php if($google_fonts == "Chewy"){ echo "selected='selected'" ; } ?>>Chewy</option>
						<option value="Chicle" <?php if($google_fonts == "Chicle"){ echo "selected='selected'" ; } ?>>Chicle</option>
						<option value="Chivo" <?php if($google_fonts == "Chivo"){ echo "selected='selected'" ; } ?>>Chivo</option>
						<option value="Coda+Caption" <?php if($google_fonts == "Coda+Caption"){ echo "selected='selected'" ; } ?>>Coda Caption</option>
						<option value="Coda" <?php if($google_fonts == "Coda"){ echo "selected='selected'" ; } ?>>Coda</option>
						<option value="Comfortaa" <?php if($google_fonts == "Comfortaa"){ echo "selected='selected'" ; } ?>>Comfortaa</option>
						<option value="Coming+Soon" <?php if($google_fonts == "Coming+Soon"){ echo "selected='selected'" ; } ?>>Coming Soon</option>
						<option value="Contrail+One" <?php if($google_fonts == "Contrail+One"){ echo "selected='selected'" ; } ?>>Contrail One</option>
						<option value="Convergence" <?php if($google_fonts == "Convergence"){ echo "selected='selected'" ; } ?>>Convergence</option>
						<option value="Cookie" <?php if($google_fonts == "Cookie"){ echo "selected='selected'" ; } ?>>Cookie</option>
						<option value="Copse" <?php if($google_fonts == "Copse"){ echo "selected='selected'" ; } ?>>Copse</option>
						<option value="Corben" <?php if($google_fonts == "Corben"){ echo "selected='selected'" ; } ?>>Corben</option>
						<option value="Cousine" <?php if($google_fonts == "Cousine"){ echo "selected='selected'" ; } ?>>Cousine</option>
						<option value="Coustard" <?php if($google_fonts == "Coustard"){ echo "selected='selected'" ; } ?>>Coustard</option>
						<option value="Covered+By+Your+Grace" <?php if($google_fonts == "Covered+By+Your+Grace"){ echo "selected='selected'" ; } ?>>Covered By Your Grace</option>
						<option value="Crafty+Girls" <?php if($google_fonts == "Crafty+Girls"){ echo "selected='selected'" ; } ?>>Crafty Girls</option>
						<option value="Creepster+Caps" <?php if($google_fonts == "Creepster+Caps"){ echo "selected='selected'" ; } ?>>Creepster Caps</option>
						<option value="Crimson+Text" <?php if($google_fonts == "Crimson+Text"){ echo "selected='selected'" ; } ?>>Crimson Text</option>
						<option value="Crushed" <?php if($google_fonts == "Crushed"){ echo "selected='selected'" ; } ?>>Crushed</option>
						<option value="Cuprum" <?php if($google_fonts == "Cuprum"){ echo "selected='selected'" ; } ?>>Cuprum</option>
						<option value="Damion" <?php if($google_fonts == "Damion"){ echo "selected='selected'" ; } ?>>Damion</option>
						<option value="Dancing+Script" <?php if($google_fonts == "Dancing+Script"){ echo "selected='selected'" ; } ?>>Dancing Script</option>
						<option value="Dawning+of+a+New+Day" <?php if($google_fonts == "Dawning+of+a+New+Day"){ echo "selected='selected'" ; } ?>>Dawning of a New Day</option>
						<option value="Days+One" <?php if($google_fonts == "Days+One"){ echo "selected='selected'" ; } ?>>Days One</option>
						<option value="Delius+Swash+Caps" <?php if($google_fonts == "Delius+Swash+Caps"){ echo "selected='selected'" ; } ?>>Delius Swash Caps</option>
						<option value="Delius+Unicase" <?php if($google_fonts == "Delius+Unicase"){ echo "selected='selected'" ; } ?>>Delius Unicase</option>
						<option value="Delius" <?php if($google_fonts == "Delius"){ echo "selected='selected'" ; } ?>>Delius</option>
						<option value="Devonshire" <?php if($google_fonts == "Devonshire"){ echo "selected='selected'" ; } ?>>Devonshire</option>
						<option value="Didact+Gothic" <?php if($google_fonts == "Didact+Gothic"){ echo "selected='selected'" ; } ?>>Didact Gothic</option>
						<option value="Dorsa" <?php if($google_fonts == "Dorsa"){ echo "selected='selected'" ; } ?>>Dorsa</option>
						<option value="Dr+Sugiyama" <?php if($google_fonts == "Dr+Sugiyama"){ echo "selected='selected'" ; } ?>>Dr Sugiyama</option>
						<option value="Droid+Sans+Mono" <?php if($google_fonts == "Droid+Sans+Mono"){ echo "selected='selected'" ; } ?>>Droid Sans Mono</option>
						<option value="Droid+Sans" <?php if($google_fonts == "Droid+Sans"){ echo "selected='selected'" ; } ?>>Droid Sans</option>
						<option value="Droid+Serif" <?php if($google_fonts == "Droid+Serif"){ echo "selected='selected'" ; } ?>>Droid Serif</option>
						<option value="EB+Garamond" <?php if($google_fonts == "EB+Garamond"){ echo "selected='selected'" ; } ?>>EB Garamond</option>
						<option value="Eater+Caps" <?php if($google_fonts == "Eater+Caps"){ echo "selected='selected'" ; } ?>>Eater Caps</option>
						<option value="Expletus+Sans" <?php if($google_fonts == "Expletus+Sans"){ echo "selected='selected'" ; } ?>>Expletus Sans</option>
						<option value="Fanwood+Text" <?php if($google_fonts == "Fanwood+Text"){ echo "selected='selected'" ; } ?>>Fanwood Text</option>
						<option value="Federant" <?php if($google_fonts == "Federant"){ echo "selected='selected'" ; } ?>>Federant</option>
						<option value="Federo" <?php if($google_fonts == "Federo"){ echo "selected='selected'" ; } ?>>Federo</option>
						<option value="Fjord+One" <?php if($google_fonts == "Fjord+One"){ echo "selected='selected'" ; } ?>>Fjord One</option>
						<option value="Fondamento" <?php if($google_fonts == "Fondamento"){ echo "selected='selected'" ; } ?>>Fondamento</option>
						<option value="Fontdiner+Swanky" <?php if($google_fonts == "Fontdiner+Swanky"){ echo "selected='selected'" ; } ?>>Fontdiner Swanky</option>
						<option value="Forum" <?php if($google_fonts == "Forum"){ echo "selected='selected'" ; } ?>>Forum</option>
						<option value="Francois+One" <?php if($google_fonts == "Francois+One"){ echo "selected='selected'" ; } ?>>Francois One</option>
						<option value="Gentium+Basic" <?php if($google_fonts == "Gentium+Basic"){ echo "selected='selected'" ; } ?>>Gentium Basic</option>
						<option value="Gentium+Book+Basic" <?php if($google_fonts == "Gentium+Book+Basic"){ echo "selected='selected'" ; } ?>>Gentium Book Basic</option>
						<option value="Geo" <?php if($google_fonts == "Geo"){ echo "selected='selected'" ; } ?>>Geo</option>
						<option value="Geostar+Fill" <?php if($google_fonts == "Geostar+Fill"){ echo "selected='selected'" ; } ?>>Geostar Fill</option>
						<option value="Geostar" <?php if($google_fonts == "Geostar"){ echo "selected='selected'" ; } ?>>Geostar</option>
						<option value="Give+You+Glory" <?php if($google_fonts == "Give+You+Glory"){ echo "selected='selected'" ; } ?>>Give You Glory</option>
						<option value="Gloria+Hallelujah" <?php if($google_fonts == "Gloria+Hallelujah"){ echo "selected='selected'" ; } ?>>Gloria Hallelujah</option>
						<option value="Goblin+One" <?php if($google_fonts == "Goblin+One"){ echo "selected='selected'" ; } ?>>Goblin One</option>
						<option value="Gochi+Hand" <?php if($google_fonts == "Gochi+Hand"){ echo "selected='selected'" ; } ?>>Gochi Hand</option>
						<option value="Goudy+Bookletter+1911" <?php if($google_fonts == "Goudy+Bookletter+1911"){ echo "selected='selected'" ; } ?>>Goudy Bookletter 1911</option>
						<option value="Gravitas+One" <?php if($google_fonts == "Gravitas+One"){ echo "selected='selected'" ; } ?>>Gravitas One</option>
						<option value="Gruppo" <?php if($google_fonts == "Gruppo"){ echo "selected='selected'" ; } ?>>Gruppo</option>
						<option value="Hammersmith+One" <?php if($google_fonts == "Hammersmith+One"){ echo "selected='selected'" ; } ?>>Hammersmith One</option>
						<option value="Herr+Von+Muellerhoff" <?php if($google_fonts == "Herr+Von+Muellerhoff"){ echo "selected='selected'" ; } ?>>Herr Von Muellerhoff</option>
						<option value="Holtwood+One+SC" <?php if($google_fonts == "Holtwood+One+SC"){ echo "selected='selected'" ; } ?>>Holtwood One SC</option>
						<option value="Homemade+Apple" <?php if($google_fonts == "Homemade+Apple"){ echo "selected='selected'" ; } ?>>Homemade Apple</option>
						<option value="IM+Fell+DW+Pica+SC" <?php if($google_fonts == "IM+Fell+DW+Pica+SC"){ echo "selected='selected'" ; } ?>>IM Fell DW Pica SC</option>
						<option value="IM+Fell+DW+Pica" <?php if($google_fonts == "IM+Fell+DW+Pica"){ echo "selected='selected'" ; } ?>>IM Fell DW Pica</option>
						<option value="IM+Fell+Double+Pica+SC" <?php if($google_fonts == "IM+Fell+Double+Pica+SC"){ echo "selected='selected'" ; } ?>>IM Fell Double Pica SC</option>
						<option value="IM+Fell+Double+Pica" <?php if($google_fonts == "IM+Fell+Double+Pica"){ echo "selected='selected'" ; } ?>>IM Fell Double Pica</option>
						<option value="IM+Fell+English+SC" <?php if($google_fonts == "IM+Fell+English+SC"){ echo "selected='selected'" ; } ?>>IM Fell English SC</option>
						<option value="IM+Fell+English" <?php if($google_fonts == "IM+Fell+English"){ echo "selected='selected'" ; } ?>>IM Fell English</option>
						<option value="IM+Fell+French+Canon+SC" <?php if($google_fonts == "IM+Fell+French+Canon+SC"){ echo "selected='selected'" ; } ?>>IM Fell French Canon SC</option>
						<option value="IM+Fell+French+Canon" <?php if($google_fonts == "IM+Fell+French+Canon"){ echo "selected='selected'" ; } ?>>IM Fell French Canon</option>
						<option value="IM+Fell+Great+Primer+SC" <?php if($google_fonts == "IM+Fell+Great+Primer+SC"){ echo "selected='selected'" ; } ?>>IM Fell Great Primer SC</option>
						<option value="IM+Fell+Great+Primer" <?php if($google_fonts == "IM+Fell+Great+Primer"){ echo "selected='selected'" ; } ?>>IM Fell Great Primer</option>
						<option value="Iceland" <?php if($google_fonts == "Iceland"){ echo "selected='selected'" ; } ?>>Iceland</option>
						<option value="Inconsolata" <?php if($google_fonts == "Inconsolata"){ echo "selected='selected'" ; } ?>>Inconsolata</option>
						<option value="Indie+Flower" <?php if($google_fonts == "Indie+Flower"){ echo "selected='selected'" ; } ?>>Indie Flower</option>
						<option value="Irish+Grover" <?php if($google_fonts == "Irish+Grover"){ echo "selected='selected'" ; } ?>>Irish Grover</option>
						<option value="Istok+Web" <?php if($google_fonts == "Istok+Web"){ echo "selected='selected'" ; } ?>>Istok Web</option>
						<option value="Jockey+One" <?php if($google_fonts == "Jockey+One"){ echo "selected='selected'" ; } ?>>Jockey One</option>
						<option value="Josefin+Sans" <?php if($google_fonts == "Josefin+Sans"){ echo "selected='selected'" ; } ?>>Josefin Sans</option>
						<option value="Josefin+Slab" <?php if($google_fonts == "Josefin+Slab"){ echo "selected='selected'" ; } ?>>Josefin Slab</option>
						<option value="Judson" <?php if($google_fonts == "Judson"){ echo "selected='selected'" ; } ?>>Judson</option>
						<option value="Julee" <?php if($google_fonts == "Julee"){ echo "selected='selected'" ; } ?>>Julee</option>
						<option value="Jura" <?php if($google_fonts == "Jura"){ echo "selected='selected'" ; } ?>>Jura</option>
						<option value="Just+Another+Hand" <?php if($google_fonts == "Just+Another+Hand"){ echo "selected='selected'" ; } ?>>Just Another Hand</option>
						<option value="Just+Me+Again+Down+Here" <?php if($google_fonts == "Just+Me+Again+Down+Here"){ echo "selected='selected'" ; } ?>>Just Me Again Down Here</option>
						<option value="Kameron" <?php if($google_fonts == "Kameron"){ echo "selected='selected'" ; } ?>>Kameron</option>
						<option value="Kelly+Slab" <?php if($google_fonts == "Kelly+Slab"){ echo "selected='selected'" ; } ?>>Kelly Slab</option>
						<option value="Kenia" <?php if($google_fonts == "Kenia"){ echo "selected='selected'" ; } ?>>Kenia</option>
						<option value="Knewave" <?php if($google_fonts == "Knewave"){ echo "selected='selected'" ; } ?>>Knewave</option>
						<option value="Kranky" <?php if($google_fonts == "Kranky"){ echo "selected='selected'" ; } ?>>Kranky</option>
						<option value="Kreon" <?php if($google_fonts == "Kreon"){ echo "selected='selected'" ; } ?>>Kreon</option>
						<option value="Kristi" <?php if($google_fonts == "Kristi"){ echo "selected='selected'" ; } ?>>Kristi</option>
						<option value="La+Belle+Aurore" <?php if($google_fonts == "La+Belle+Aurore"){ echo "selected='selected'" ; } ?>>La Belle Aurore</option>
						<option value="Lancelot" <?php if($google_fonts == "Lancelot"){ echo "selected='selected'" ; } ?>>Lancelot</option>
						<option value="Lato" <?php if($google_fonts == "Lato"){ echo "selected='selected'" ; } ?>>Lato</option>
						<option value="League+Script" <?php if($google_fonts == "League+Script"){ echo "selected='selected'" ; } ?>>League Script</option>
						<option value="Leckerli+One" <?php if($google_fonts == "Leckerli+One"){ echo "selected='selected'" ; } ?>>Leckerli One</option>
						<option value="Lekton" <?php if($google_fonts == "Lekton"){ echo "selected='selected'" ; } ?>>Lekton</option>
						<option value="Lemon" <?php if($google_fonts == "Lemon"){ echo "selected='selected'" ; } ?>>Lemon</option>
						<option value="Limelight" <?php if($google_fonts == "Limelight"){ echo "selected='selected'" ; } ?>>Limelight</option>
						<option value="Linden+Hill" <?php if($google_fonts == "Linden+Hill"){ echo "selected='selected'" ; } ?>>Linden Hill</option>
						<option value="Lobster+Two" <?php if($google_fonts == "Lobster+Two"){ echo "selected='selected'" ; } ?>>Lobster Two</option>
						<option value="Lobster" <?php if($google_fonts == "Lobster"){ echo "selected='selected'" ; } ?>>Lobster</option>
						<option value="Lora" <?php if($google_fonts == "Lora"){ echo "selected='selected'" ; } ?>>Lora</option>
						<option value="Love+Ya+Like+A+Sister" <?php if($google_fonts == "Love+Ya+Like+A+Sister"){ echo "selected='selected'" ; } ?>>Love Ya Like A Sister</option>
						<option value="Loved+by+the+King" <?php if($google_fonts == "Loved+by+the+King"){ echo "selected='selected'" ; } ?>>Loved by the King</option>
						<option value="Luckiest+Guy" <?php if($google_fonts == "Luckiest+Guy"){ echo "selected='selected'" ; } ?>>Luckiest Guy</option>
						<option value="Maiden+Orange" <?php if($google_fonts == "Maiden+Orange"){ echo "selected='selected'" ; } ?>>Maiden Orange</option>
						<option value="Mako" <?php if($google_fonts == "Mako"){ echo "selected='selected'" ; } ?>>Mako</option>
						<option value="Marck+Script" <?php if($google_fonts == "Marck+Script"){ echo "selected='selected'" ; } ?>>Marck Script</option>
						<option value="Marvel" <?php if($google_fonts == "Marvel"){ echo "selected='selected'" ; } ?>>Marvel</option>
						<option value="Mate+SC" <?php if($google_fonts == "Mate+SC"){ echo "selected='selected'" ; } ?>>Mate SC</option>
						<option value="Mate" <?php if($google_fonts == "Mate"){ echo "selected='selected'" ; } ?>>Mate</option>
						<option value="Maven+Pro" <?php if($google_fonts == "Maven+Pro"){ echo "selected='selected'" ; } ?>>Maven Pro</option>
						<option value="Meddon" <?php if($google_fonts == "Meddon"){ echo "selected='selected'" ; } ?>>Meddon</option>
						<option value="MedievalSharp" <?php if($google_fonts == "MedievalSharp"){ echo "selected='selected'" ; } ?>>MedievalSharp</option>
						<option value="Megrim" <?php if($google_fonts == "Megrim"){ echo "selected='selected'" ; } ?>>Megrim</option>
						<option value="Merienda+One" <?php if($google_fonts == "Merienda+One"){ echo "selected='selected'" ; } ?>>Merienda One</option>
						<option value="Merriweather" <?php if($google_fonts == "Merriweather"){ echo "selected='selected'" ; } ?>>Merriweather</option>
						<option value="Metrophobic" <?php if($google_fonts == "Metrophobic"){ echo "selected='selected'" ; } ?>>Metrophobic</option>
						<option value="Michroma" <?php if($google_fonts == "Michroma"){ echo "selected='selected'" ; } ?>>Michroma</option>
						<option value="Miltonian+Tattoo" <?php if($google_fonts == "Miltonian+Tattoo"){ echo "selected='selected'" ; } ?>>Miltonian Tattoo</option>
						<option value="Miltonian" <?php if($google_fonts == "Miltonian"){ echo "selected='selected'" ; } ?>>Miltonian</option>
						<option value="Miss+Fajardose" <?php if($google_fonts == "Miss+Fajardose"){ echo "selected='selected'" ; } ?>>Miss Fajardose</option>
						<option value="Miss+Saint+Delafield" <?php if($google_fonts == "Miss+Saint+Delafield"){ echo "selected='selected'" ; } ?>>Miss Saint Delafield</option>
						<option value="Modern+Antiqua" <?php if($google_fonts == "Modern+Antiqua"){ echo "selected='selected'" ; } ?>>Modern Antiqua</option>
						<option value="Molengo" <?php if($google_fonts == "Molengo"){ echo "selected='selected'" ; } ?>>Molengo</option>
						<option value="Monofett" <?php if($google_fonts == "Monofett"){ echo "selected='selected'" ; } ?>>Monofett</option>
						<option value="Monoton" <?php if($google_fonts == "Monoton"){ echo "selected='selected'" ; } ?>>Monoton</option>
						<option value="Monsieur+La+Doulaise" <?php if($google_fonts == "Monsieur+La+Doulaise"){ echo "selected='selected'" ; } ?>>Monsieur La Doulaise</option>
						<option value="Montez" <?php if($google_fonts == "Montez"){ echo "selected='selected'" ; } ?>>Montez</option>
						<option value="Mountains+of+Christmas" <?php if($google_fonts == "Mountains+of+Christmas"){ echo "selected='selected'" ; } ?>>Mountains of Christmas</option>
						<option value="Mr+Bedford" <?php if($google_fonts == "Mr+Bedford"){ echo "selected='selected'" ; } ?>>Mr Bedford</option>
						<option value="Mr+Dafoe" <?php if($google_fonts == "Mr+Dafoe"){ echo "selected='selected'" ; } ?>>Mr Dafoe</option>
						<option value="Mr+De+Haviland" <?php if($google_fonts == "Mr+De+Haviland"){ echo "selected='selected'" ; } ?>>Mr De Haviland</option>
						<option value="Mrs+Sheppards" <?php if($google_fonts == "Mrs+Sheppards"){ echo "selected='selected'" ; } ?>>Mrs Sheppards</option>
						<option value="Muli" <?php if($google_fonts == "Muli"){ echo "selected='selected'" ; } ?>>Muli</option>
						<option value="Neucha" <?php if($google_fonts == "Neucha"){ echo "selected='selected'" ; } ?>>Neucha</option>
						<option value="Neuton" <?php if($google_fonts == "Neuton"){ echo "selected='selected'" ; } ?>>Neuton</option>
						<option value="News+Cycle" <?php if($google_fonts == "News+Cycle"){ echo "selected='selected'" ; } ?>>News Cycle</option>
						<option value="Niconne" <?php if($google_fonts == "Niconne"){ echo "selected='selected'" ; } ?>>Niconne</option>
						<option value="Nixie+One" <?php if($google_fonts == "Nixie+One"){ echo "selected='selected'" ; } ?>>Nixie One</option>
						<option value="Nobile" <?php if($google_fonts == "Nobile"){ echo "selected='selected'" ; } ?>>Nobile</option>
						<option value="Nosifer+Caps" <?php if($google_fonts == "Nosifer+Caps"){ echo "selected='selected'" ; } ?>>Nosifer Caps</option>
						<option value="Nothing+You+Could+Do" <?php if($google_fonts == "Nothing+You+Could+Do"){ echo "selected='selected'" ; } ?>>Nothing You Could Do</option>
						<option value="Nova+Cut" <?php if($google_fonts == "Nova+Cut"){ echo "selected='selected'" ; } ?>>Nova Cut</option>
						<option value="Nova+Flat" <?php if($google_fonts == "Nova+Flat"){ echo "selected='selected'" ; } ?>>Nova Flat</option>
						<option value="Nova+Mono" <?php if($google_fonts == "Nova+Mono"){ echo "selected='selected'" ; } ?>>Nova Mono</option>
						<option value="Nova+Oval" <?php if($google_fonts == "Nova+Oval"){ echo "selected='selected'" ; } ?>>Nova Oval</option>
						<option value="Nova+Round" <?php if($google_fonts == "Nova+Round"){ echo "selected='selected'" ; } ?>>Nova Round</option>
						<option value="Nova+Script" <?php if($google_fonts == "Nova+Script"){ echo "selected='selected'" ; } ?>>Nova Script</option>
						<option value="Nova+Slim" <?php if($google_fonts == "Nova+Slim"){ echo "selected='selected'" ; } ?>>Nova Slim</option>
						<option value="Nova+Square" <?php if($google_fonts == "Nova+Square"){ echo "selected='selected'" ; } ?>>Nova Square</option>
						<option value="Numans" <?php if($google_fonts == "Numans"){ echo "selected='selected'" ; } ?>>Numans</option>
						<option value="Nunito" <?php if($google_fonts == "Nunito"){ echo "selected='selected'" ; } ?>>Nunito</option>
						<option value="Old+Standard+TT" <?php if($google_fonts == "Old+Standard+TT"){ echo "selected='selected'" ; } ?>>Old Standard TT</option>
						<option value="Open+Sans+Condensed" <?php if($google_fonts == "Open+Sans+Condensed"){ echo "selected='selected'" ; } ?>>Open Sans Condensed</option>
						<option value="Open+Sans" <?php if($google_fonts == "Open+Sans"){ echo "selected='selected'" ; } ?>>Open Sans</option>
						<option value="Orbitron" <?php if($google_fonts == "Orbitron"){ echo "selected='selected'" ; } ?>>Orbitron</option>
						<option value="Oswald" <?php if($google_fonts == "Oswald"){ echo "selected='selected'" ; } ?>>Oswald</option>
						<option value="Over+the+Rainbow" <?php if($google_fonts == "Over+the+Rainbow"){ echo "selected='selected'" ; } ?>>Over the Rainbow</option>
						<option value="Ovo" <?php if($google_fonts == "Ovo"){ echo "selected='selected'" ; } ?>>Ovo</option>
						<option value="PT+Sans+Caption" <?php if($google_fonts == "PT+Sans+Caption"){ echo "selected='selected'" ; } ?>>PT Sans Caption</option>
						<option value="PT+Sans+Narrow" <?php if($google_fonts == "PT+Sans+Narrow"){ echo "selected='selected'" ; } ?>>PT Sans Narrow</option>
						<option value="PT+Sans" <?php if($google_fonts == "PT+Sans"){ echo "selected='selected'" ; } ?>>PT Sans</option>
						<option value="PT+Serif+Caption" <?php if($google_fonts == "PT+Serif+Caption"){ echo "selected='selected'" ; } ?>>PT Serif Caption</option>
						<option value="PT+Serif" <?php if($google_fonts == "PT+Serif"){ echo "selected='selected'" ; } ?>>PT Serif</option>
						<option value="Pacifico" <?php if($google_fonts == "Pacifico"){ echo "selected='selected'" ; } ?>>Pacifico</option>
						<option value="Passero+One" <?php if($google_fonts == "Passero+One"){ echo "selected='selected'" ; } ?>>Passero One</option>
						<option value="Patrick+Hand" <?php if($google_fonts == "Patrick+Hand"){ echo "selected='selected'" ; } ?>>Patrick Hand</option>
						<option value="Paytone+One" <?php if($google_fonts == "Paytone+One"){ echo "selected='selected'" ; } ?>>Paytone One</option>
						<option value="Permanent+Marker" <?php if($google_fonts == "Permanent+Marker"){ echo "selected='selected'" ; } ?>>Permanent Marker</option>
						<option value="Petrona" <?php if($google_fonts == "Petrona"){ echo "selected='selected'" ; } ?>>Petrona</option>
						<option value="Philosopher" <?php if($google_fonts == "Philosopher"){ echo "selected='selected'" ; } ?>>Philosopher</option>
						<option value="Piedra" <?php if($google_fonts == "Piedra"){ echo "selected='selected'" ; } ?>>Piedra</option>
						<option value="Pinyon+Script" <?php if($google_fonts == "Pinyon+Script"){ echo "selected='selected'" ; } ?>>Pinyon Script</option>
						<option value="Play" <?php if($google_fonts == "Play"){ echo "selected='selected'" ; } ?>>Play</option>
						<option value="Playfair+Display" <?php if($google_fonts == "Playfair+Display"){ echo "selected='selected'" ; } ?>>Playfair Display</option>
						<option value="Podkova" <?php if($google_fonts == "Podkova"){ echo "selected='selected'" ; } ?>>Podkova</option>
						<option value="Poller+One" <?php if($google_fonts == "Poller+One"){ echo "selected='selected'" ; } ?>>Poller One</option>
						<option value="Poly" <?php if($google_fonts == "Poly"){ echo "selected='selected'" ; } ?>>Poly</option>
						<option value="Pompiere" <?php if($google_fonts == "Pompiere"){ echo "selected='selected'" ; } ?>>Pompiere</option>
						<option value="Prata" <?php if($google_fonts == "Prata"){ echo "selected='selected'" ; } ?>>Prata</option>
						<option value="Prociono" <?php if($google_fonts == "Prociono"){ echo "selected='selected'" ; } ?>>Prociono</option>
						<option value="Puritan" <?php if($google_fonts == "Puritan"){ echo "selected='selected'" ; } ?>>Puritan</option>
						<option value="Quattrocento+Sans" <?php if($google_fonts == "Quattrocento+Sans"){ echo "selected='selected'" ; } ?>>Quattrocento Sans</option>
						<option value="Quattrocento" <?php if($google_fonts == "Quattrocento"){ echo "selected='selected'" ; } ?>>Quattrocento</option>
						<option value="Questrial" <?php if($google_fonts == "Questrial"){ echo "selected='selected'" ; } ?>>Questrial</option>
						<option value="Quicksand" <?php if($google_fonts == "Quicksand"){ echo "selected='selected'" ; } ?>>Quicksand</option>
						<option value="Radley" <?php if($google_fonts == "Radley"){ echo "selected='selected'" ; } ?>>Radley</option>
						<option value="Raleway" <?php if($google_fonts == "Raleway"){ echo "selected='selected'" ; } ?>>Raleway</option>
						<option value="Rammetto+One" <?php if($google_fonts == "Rammetto+One"){ echo "selected='selected'" ; } ?>>Rammetto One</option>
						<option value="Rancho" <?php if($google_fonts == "Rancho"){ echo "selected='selected'" ; } ?>>Rancho</option>
						<option value="Rationale" <?php if($google_fonts == "Rationale"){ echo "selected='selected'" ; } ?>>Rationale</option>
						<option value="Redressed" <?php if($google_fonts == "Redressed"){ echo "selected='selected'" ; } ?>>Redressed</option>
						<option value="Reenie+Beanie" <?php if($google_fonts == "Reenie+Beanie"){ echo "selected='selected'" ; } ?>>Reenie Beanie</option>
						<option value="Ribeye+Marrow" <?php if($google_fonts == "Ribeye+Marrow"){ echo "selected='selected'" ; } ?>>Ribeye Marrow</option>
						<option value="Ribeye" <?php if($google_fonts == "Ribeye"){ echo "selected='selected'" ; } ?>>Ribeye</option>
						<option value="Righteous" <?php if($google_fonts == "Righteous"){ echo "selected='selected'" ; } ?>>Righteous</option>
						<option value="Rochester" <?php if($google_fonts == "Rochester"){ echo "selected='selected'" ; } ?>>Rochester</option>
						<option value="Rock+Salt" <?php if($google_fonts == "Rock+Salt"){ echo "selected='selected'" ; } ?>>Rock Salt</option>
						<option value="Rokkitt" <?php if($google_fonts == "Rokkitt"){ echo "selected='selected'" ; } ?>>Rokkitt</option>
						<option value="Rosario" <?php if($google_fonts == "Rosario"){ echo "selected='selected'" ; } ?>>Rosario</option>
						<option value="Ruslan+Display" <?php if($google_fonts == "Ruslan+Display"){ echo "selected='selected'" ; } ?>>Ruslan Display</option>
						<option value="Salsa" <?php if($google_fonts == "Salsa"){ echo "selected='selected'" ; } ?>>Salsa</option>
						<option value="Sancreek" <?php if($google_fonts == "Sancreek"){ echo "selected='selected'" ; } ?>>Sancreek</option>
						<option value="Sansita+One" <?php if($google_fonts == "Sansita+One"){ echo "selected='selected'" ; } ?>>Sansita One</option>
						<option value="Satisfy" <?php if($google_fonts == "Satisfy"){ echo "selected='selected'" ; } ?>>Satisfy</option>
						<option value="Schoolbell" <?php if($google_fonts == "Schoolbell"){ echo "selected='selected'" ; } ?>>Schoolbell</option>
						<option value="Shadows+Into+Light" <?php if($google_fonts == "Shadows+Into+Light"){ echo "selected='selected'" ; } ?>>Shadows Into Light</option>
						<option value="Shanti" <?php if($google_fonts == "Shanti"){ echo "selected='selected'" ; } ?>>Shanti</option>
						<option value="Short+Stack" <?php if($google_fonts == "Short+Stack"){ echo "selected='selected'" ; } ?>>Short Stack</option>
						<option value="Sigmar+One" <?php if($google_fonts == "Sigmar+One"){ echo "selected='selected'" ; } ?>>Sigmar One</option>
						<option value="Signika+Negative" <?php if($google_fonts == "Signika+Negative"){ echo "selected='selected'" ; } ?>>Signika Negative</option>
						<option value="Signika" <?php if($google_fonts == "Signika"){ echo "selected='selected'" ; } ?>>Signika</option>
						<option value="Six+Caps" <?php if($google_fonts == "Six+Caps"){ echo "selected='selected'" ; } ?>>Six Caps</option>
						<option value="Slackey" <?php if($google_fonts == "Slackey"){ echo "selected='selected'" ; } ?>>Slackey</option>
						<option value="Smokum" <?php if($google_fonts == "Smokum"){ echo "selected='selected'" ; } ?>>Smokum</option>
						<option value="Smythe" <?php if($google_fonts == "Smythe"){ echo "selected='selected'" ; } ?>>Smythe</option>
						<option value="Sniglet" <?php if($google_fonts == "Sniglet"){ echo "selected='selected'" ; } ?>>Sniglet</option>
						<option value="Snippet" <?php if($google_fonts == "Snippet"){ echo "selected='selected'" ; } ?>>Snippet</option>
						<option value="Sorts+Mill+Goudy" <?php if($google_fonts == "Sorts+Mill+Goudy"){ echo "selected='selected'" ; } ?>>Sorts Mill Goudy</option>
						<option value="Special+Elite" <?php if($google_fonts == "Special+Elite"){ echo "selected='selected'" ; } ?>>Special Elite</option>
						<option value="Spinnaker" <?php if($google_fonts == "Spinnaker"){ echo "selected='selected'" ; } ?>>Spinnaker</option>
						<option value="Spirax" <?php if($google_fonts == "Spirax"){ echo "selected='selected'" ; } ?>>Spirax</option>
						<option value="Stardos+Stencil" <?php if($google_fonts == "Stardos+Stencil"){ echo "selected='selected'" ; } ?>>Stardos Stencil</option>
						<option value="Sue+Ellen+Francisco" <?php if($google_fonts == "Sue+Ellen+Francisco"){ echo "selected='selected'" ; } ?>>Sue Ellen Francisco</option>
						<option value="Sunshiney" <?php if($google_fonts == "Sunshiney"){ echo "selected='selected'" ; } ?>>Sunshiney</option>
						<option value="Supermercado+One" <?php if($google_fonts == "Supermercado+One"){ echo "selected='selected'" ; } ?>>Supermercado One</option>
						<option value="Swanky+and+Moo+Moo" <?php if($google_fonts == "Swanky+and+Moo+Moo"){ echo "selected='selected'" ; } ?>>Swanky and Moo Moo</option>
						<option value="Syncopate" <?php if($google_fonts == "Syncopate"){ echo "selected='selected'" ; } ?>>Syncopate</option>
						<option value="Tangerine" <?php if($google_fonts == "Tangerine"){ echo "selected='selected'" ; } ?>>Tangerine</option>
						<option value="Tenor+Sans" <?php if($google_fonts == "Tenor+Sans"){ echo "selected='selected'" ; } ?>>Tenor Sans</option>
						<option value="Terminal+Dosis" <?php if($google_fonts == "Terminal+Dosis"){ echo "selected='selected'" ; } ?>>Terminal Dosis</option>
						<option value="The+Girl+Next+Door" <?php if($google_fonts == "The+Girl+Next+Door"){ echo "selected='selected'" ; } ?>>The Girl Next Door</option>
						<option value="Tienne" <?php if($google_fonts == "Tienne"){ echo "selected='selected'" ; } ?>>Tienne</option>
						<option value="Tinos" <?php if($google_fonts == "Tinos"){ echo "selected='selected'" ; } ?>>Tinos</option>
						<option value="Tulpen+One" <?php if($google_fonts == "Tulpen+One"){ echo "selected='selected'" ; } ?>>Tulpen One</option>
						<option value="Ubuntu+Condensed" <?php if($google_fonts == "Ubuntu+Condensed"){ echo "selected='selected'" ; } ?>>Ubuntu Condensed</option>
						<option value="Ubuntu+Mono" <?php if($google_fonts == "Ubuntu+Mono"){ echo "selected='selected'" ; } ?>>Ubuntu Mono</option>
						<option value="Ubuntu" <?php if($google_fonts == "Ubuntu"){ echo "selected='selected'" ; } ?>>Ubuntu</option>
						<option value="Ultra" <?php if($google_fonts == "Ultra"){ echo "selected='selected'" ; } ?>>Ultra</option>
						<option value="UnifrakturCook" <?php if($google_fonts == "UnifrakturCook"){ echo "selected='selected'" ; } ?>>UnifrakturCook</option>
						<option value="UnifrakturMaguntia" <?php if($google_fonts == "UnifrakturMaguntia"){ echo "selected='selected'" ; } ?>>UnifrakturMaguntia</option>
						<option value="Unkempt" <?php if($google_fonts == "Unkempt"){ echo "selected='selected'" ; } ?>>Unkempt</option>
						<option value="Unlock" <?php if($google_fonts == "Unlock"){ echo "selected='selected'" ; } ?>>Unlock</option>
						<option value="Unna" <?php if($google_fonts == "Unna"){ echo "selected='selected'" ; } ?>>Unna</option>
						<option value="VT323" <?php if($google_fonts == "VT323"){ echo "selected='selected'" ; } ?>>VT323</option>
						<option value="Varela+Round" <?php if($google_fonts == "Varela+Round"){ echo "selected='selected'" ; } ?>>Varela Round</option>
						<option value="Varela" <?php if($google_fonts == "Varela"){ echo "selected='selected'" ; } ?>>Varela</option>
						<option value="Vast+Shadow" <?php if($google_fonts == "Vast+Shadow"){ echo "selected='selected'" ; } ?>>Vast Shadow</option>
						<option value="Vibur" <?php if($google_fonts == "Vibur"){ echo "selected='selected'" ; } ?>>Vibur</option>
						<option value="Vidaloka" <?php if($google_fonts == "Vidaloka"){ echo "selected='selected'" ; } ?>>Vidaloka</option>
						<option value="Volkhov" <?php if($google_fonts == "Volkhov"){ echo "selected='selected'" ; } ?>>Volkhov</option>
						<option value="Vollkorn" <?php if($google_fonts == "Vollkorn"){ echo "selected='selected'" ; } ?>>Vollkorn</option>
						<option value="Voltaire" <?php if($google_fonts == "Voltaire"){ echo "selected='selected'" ; } ?>>Voltaire</option>
						<option value="Waiting+for+the+Sunrise" <?php if($google_fonts == "Waiting+for+the+Sunrise"){ echo "selected='selected'" ; } ?>>Waiting for the Sunrise</option>
						<option value="Wallpoet" <?php if($google_fonts == "Wallpoet"){ echo "selected='selected'" ; } ?>>Wallpoet</option>
						<option value="Walter+Turncoat" <?php if($google_fonts == "Walter+Turncoat"){ echo "selected='selected'" ; } ?>>Walter Turncoat</option>
						<option value="Wire+One" <?php if($google_fonts == "Wire+One"){ echo "selected='selected'" ; } ?>>Wire One</option>
						<option value="Yanone+Kaffeesatz" <?php if($google_fonts == "Yanone+Kaffeesatz"){ echo "selected='selected'" ; } ?>>Yanone Kaffeesatz</option>
						<option value="Yellowtail" <?php if($google_fonts == "Yellowtail"){ echo "selected='selected'" ; } ?>>Yellowtail</option>
						<option value="Yeseva+One" <?php if($google_fonts == "Yeseva+One"){ echo "selected='selected'" ; } ?>>Yeseva One</option>
						<option value="Zeyada" <?php if($google_fonts == "Zeyada"){ echo "selected='selected'" ; } ?>>Zeyada</option>
                    </select>
                </div>
			</div>
            <div class="form-row">
                <div class="form-label"><?php _e('RTL view', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
					<div class="form-label-checkbox">
						<input type="checkbox" name="rtl_view" value="1" <?php echo (osc_esc_html( osc_get_preference('rtl_view', 'osclasswizards_theme') ) == "1")? "checked": ""; ?>>
						<br>
						<div class="help-box"><?php _e('Right to left view.', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
					</div>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Custom CSS', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;"name="custom_css"><?php echo osc_esc_html( osc_get_preference('custom_css', 'osclasswizards_theme') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('You can write your custom CSS and override the default CSS.', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                </div>
            </div>			
			<div class="form-actions">
				<input id="button" type="submit" value="<?php echo osc_esc_html(__('Save changes',OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit">
			</div>
		</div>
	</fieldset>
</form>