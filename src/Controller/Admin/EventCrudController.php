<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }


    public function configureFields(string $pageName): iterable
    {
        if($pageName == 'new')
        {
            return [
                TextField::new('name', 'Nom de l\'événement'),
                MoneyField::new('price')->setCurrency('EUR'),
                TextField::new('description', 'Description'),
                ImageField::new('image')
                    ->setBasePath('uploads/')
                    ->setUploadDir('public/uploads/')
                    ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
                    ->setRequired(false)
            ];
        }
        elseif($pageName == 'edit')
        {
            return [
                TextField::new('name', 'Nom de l\'événement'),
                MoneyField::new('price')->setCurrency('EUR'),
                TextField::new('description', 'Description'),
                ImageField::new('image')
                    ->setBasePath('uploads/')
                    ->setUploadDir('public/uploads/')
                    ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
                    ->setRequired(false)
            ];
        }
        else
        {
            return [
                TextField::new('name', 'Nom de l\'événement'),
                MoneyField::new('price')->setCurrency('EUR'),
                TextField::new('description', 'Description'),
                ImageField::new('image')
                    ->setBasePath('uploads/')
                    ->setUploadDir('public/uploads/')
                    ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
                    ->setRequired(false)
            ];
        }
    }

}
