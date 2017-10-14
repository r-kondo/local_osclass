<h3><?php _e('Dating attributes', 'dating_attributes') ; ?></h3>
<table>
    <tr>
        <td><?php _e('You are', 'dating_attributes'); ?>:</td>
        <td>
            <label for="gfm"><input type="radio" name="genderFrom" id="gfm" value="MAN" <?php if(Params::getParam('genderFrom')=='MAN') { echo 'checked="cheked"'; } ?>/><?php _e('Man', 'dating_attributes'); ?></label><br />
            <label for="gfw"><input type="radio" name="genderFrom" id="gfw" value="WOMAN" <?php if(Params::getParam('genderFrom')=='WOMAN') { echo 'checked="cheked"'; } ?>/><?php _e('Woman', 'dating_attributes'); ?></label><br />
            <label for="gfn"><input type="radio" name="genderFrom" id="gfn" value="NI" <?php if(Params::getParam('genderFrom')=='NI') { echo 'checked="cheked"'; } ?>/><?php _e('Not informed', 'dating_attributes'); ?></label><br />
        </td>
    </tr>
    <tr>
        <td><?php _e('Looking for', 'dating_attributes'); ?>:</td>
        <td>
            <label for="gtm"><input type="radio" name="genderTo" id="gtm" value="MAN" <?php if(Params::getParam('genderTo')=='MAN') { echo 'checked="cheked"'; } ?>/><?php _e('Man', 'dating_attributes'); ?></label><br />
            <label for="gtw"><input type="radio" name="genderTo" id="gtw" value="WOMAN" <?php if(Params::getParam('genderTo')=='WOMAN') { echo 'checked="cheked"'; } ?>/><?php _e('Woman', 'dating_attributes'); ?></label><br />
            <label for="gtn"><input type="radio" name="genderTo" id="gtn" value="NI" <?php if(Params::getParam('genderTo')=='NI') { echo 'checked="cheked"'; } ?>/><?php _e('Not informed', 'dating_attributes'); ?></label><br />
        </td>
    </tr>
    <tr>
        <td><?php _e('Relation type', 'dating_attributes'); ?>:</td>
        <td>
            <label for="grm"><input type="radio" name="relation" id="grm" value="FRIENDSHIP" <?php if(Params::getParam('relation')=='FRIENDSHIP') { echo 'checked="cheked"'; } ?>/><?php _e('Friendship', 'dating_attributes'); ?></label><br />
            <label for="grw"><input type="radio" name="relation" id="grw" value="FORMAL" <?php if(Params::getParam('relation')=='FORMAL') { echo 'checked="cheked"'; } ?>/><?php _e('Formal relation', 'dating_attributes'); ?></label><br />
            <label for="grn"><input type="radio" name="relation" id="grn" value="INFORMAL" <?php if(Params::getParam('relation')=='INFORMAL') { echo 'checked="cheked"'; } ?>/><?php _e('Informal relation', 'dating_attributes'); ?></label><br />
	</td>
    </tr>
</table>