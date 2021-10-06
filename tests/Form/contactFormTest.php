<?php 
// tests/Form/ProductsFormTest.php 
namespace App\Tests\Form; 
 

use App\Entity\Comments;
use App\Entity\Contacts;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase; 
 
 

class ContactsFormTest extends KernelTestCase{ 
     
    public function testNewCategory(){ 
        $products=(new Contacts()) 
        ->setNameContact('77')
        ->setFirstNameContact('77') 
        ->setEmailContact('77')
        ->setPhoneContact('77')
        ->setCommentContact('77'); 
        self::bootKernel(); 
        $error = self::$container->get('validator')->validate($products); 
        $this->assertCount(0,$error); 
    } 
}


class CommentsFormTest extends KernelTestCase{ 
     
    public function testNewCategory(){ 
        $products=(new Comments()) 
        ->setTitleComment('77')
        ->setNameComment('77') 
        ->setEmailComment('77')
        ->setCommentComments('77');   
        self::bootKernel(); 
        $error = self::$container->get('validator')->validate($products); 
        $this->assertCount(0,$error); 
    } 
}