<?php
namespace Drupal\kuroko\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\Controller\EntityViewController;
use Drupal\node\Entity\Node;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Controller\ControllerBase;

class Porting extends ControllerBase
{
	public function ShowPage()
	{

		$form = [
			'say' => 'Hello',
			'something' => 'How are you doing?',
		];

        $test = \Drupal::entityManager()->getStorage('node')->loadByProperties( array('type'=>'article') );
        $count = 0;
        foreach( $test as $t ){
            $title[] = $t->label();
            //$id[] = $t;
            //$title[] = $t->label();//title
            //$content[] = $t->body->value;//content
            $nodes[$count]['title'] = $t->label();//title
            $nodes[$count]['content'] = $t->body->value;//content
            $count ++;
        }
        /*
        $nodes = [
            'title' => implode('<br />', $title),
            'content' => implode('<br />', $content),
            'sample' => 'Look up',            
        ];
        */
        $markup = [
            '#theme' => 'Porting', // theme name that will be matched in *.module
            '#title' => 'This is a title',
            '#form' => $form,
            '#nodes' => $nodes,
        ];

        return $markup;		
	}
}

