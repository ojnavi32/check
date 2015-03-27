<?php
namespace Drupal\form_test\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Query;
//test
use Drupal\node\Entity\Node;



class test1 extends ControllerBase {
    public function ShowPage() {

        $form = \Drupal::formBuilder()->getForm( new Form() );
    
        $markup = [
            '#theme' => 'test1', // theme name that will be matched in *.module
            '#title' => 'Click IMPORT',
            '#form' => $form,
        ];

        return $markup;
    }
}

class Form extends FormBase {

    public function getFormId()
    {
        return 'form4';
    }

    public function buildForm( array $form, FormStateInterface $form_state ) {
        $form['email'] = [
            '#type' => 'hidden',
            '#title' => $this->t( 'Input Title' ),
            '#default_value' => \Drupal::state()->get('third.email'),
        ];

        $form['content'] = [
            '#type' => 'hidden',
            '#title' => $this->t( 'Input Content' ),
            '#default_value' => \Drupal::state()->get('third.content'),
        ];

        $form['image'] = [
            '#type' => 'hidden',
            '#title' => $this->t( 'Input Image' ),
            '#default_value' => \Drupal::state()->get('third.image'),
        ];        

        $form['action']['submit'] = [
            '#type' => 'submit',
            '#value' => 'IMPORT',
            '#prefix' => '<div class="submit-button">',
            '#suffix' => '</div>',
        ];

        return $form;
    }

    public function submitForm( array &$form, FormStateInterface $form_state ) {
/*
    $getfile = file_get_contents("C:/wamp/www/work/modules/form_test/src/Controller/text1.txt");

        $str = explode('-- new article --', $getfile);
        $j = 0;
        while ($j < 3) {

        $aa = preg_split('/[\r\n]+/', $str[$j]);

        $new = null;

        foreach( $aa as $a){
            if( $a == "" ) continue;
            $new[] = $a;
        } //foreach loop

                $number =  'Hello there'; // Number
                $title = $new[1]; // Title
                $content =  $new[2]; // Content
                $date =  $new[3]; // Date
                $url = $new[4];  //url
            $p = [];
            $p['type'] = 'article';
            $p['title'] = ''.$title;

            $node = Node::create( $p );
            $node->save();

    $file = file_save_data(file_get_contents($url));
    \Drupal::service('file.usage')->add($file, 'editor', 'node', $node->id());

        $src = $file->url();
        $src = str_replace('http://default', 'http://localhost/work', $src);
        $uuid = $file->uuid();
        $img = "<img src='$src' data-entity-type='file' data-entity-uuid='$uuid'>";

            $node->body->format = 'full_html';
            $node->body->value = '<h1>'.$content.'</h1><br/>Date: '.$date.'<br />'.$img; 

            $node->save();
            $j++;
        }
*/

for ($id=4; $id <= 7; $id++) {

$db = db_select('port_data', 'port_data')
    ->fields('port_data', array('data'))
    ->condition('idx', $id)
    ->execute();

    while ($r = $db->fetchAssoc()) {
        $getfile = $r['data'];
//$getfile = file_get_contents("C:/wamp/www/work/modules/form_test/src/Controller/text1.txt");
$str = explode('{', $getfile);

$aa = $str[3];

$aw = explode(',"', $aa);

$idx = $aw[0];
$idx1 = explode(':', $idx); 
$idx1trim = trim($idx1[1], ' " ');
$data_idx1trim = $idx1trim;

$idx_member = $aw[1];
$idx_member1 = explode(':', $idx_member);   
$idx_member1trim = trim($idx_member1[1], ' " ');
$data_idx_member1trim = $idx_member1trim;

$subject = $aw[2];
$subject1 =explode(':', $subject);
$subject1trim = trim($subject1[1], ' " ');
$data_subject1trim = $subject1trim;

$content = $aw[3];
$content1 = explode('":', $content);
$content1trim = trim($content1[1], ' " ');
$data_content1trim = $content1trim;

$category_name = $aw[4];
$category_name1 = explode(':', $category_name);
$category_name1trim = trim($category_name1[1], ' " ');
$data_category_name1trim = $category_name1trim;

$attachment = $aw[5];
$attachment1 = explode(':', $attachment);
$attachment1trim = trim($attachment1[1], ' " ');
$data_attachment1trim = $attachment1trim;

$site_extract = $aw[6];
$site_extract1 = explode(':', $site_extract);
$site_extract1trim = trim($site_extract1[1], ' "} ');
$data_site_extract1trim = $site_extract1trim;

/*
$qry = $conn->prepare("INSERT INTO post_data_sonub (idx, idx_member, subject, content, category_name, attachment, site_extract) VALUES (?,?,?,?,?,?,?)");
$qry->bindParam(1, $data_idx1trim);
$qry->bindParam(2, $data_idx_member1trim);
$qry->bindParam(3, $data_subject1trim);
$qry->bindParam(4, $data_content1trim);
$qry->bindParam(5, $data_category_name1trim);
$qry->bindParam(6, $data_attachment1trim);
$qry->bindParam(7, $data_site_extract1trim);
$qry->execute();
*/
            $p = [];
            $p['type'] = 'article';
            $p['title'] = ''.$data_subject1trim;

            $node = Node::create( $p );
            $node->save();
/*
    $file = file_save_data(file_get_contents($url));
    \Drupal::service('file.usage')->add($file, 'editor', 'node', $node->id());

        $src = $file->url();
        $src = str_replace('http://default', 'http://localhost/work', $src);
        $uuid = $file->uuid();
        $img = "<img src='$src' data-entity-type='file' data-entity-uuid='$uuid'>";
*/
            $node->body->format = 'full_html';
            $node->body->value = '<h1>'.$data_content1trim.'</h1>'; 

            $node->save();
 } //while loop
} //for loop
echo "OK";

    }
}