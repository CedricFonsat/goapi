<?php

namespace App\Controller\Admin;

use App\Entity\CollectionCard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CollectionCardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CollectionCard::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
          //  IdField::new('id'),
            TextField::new('name'),
            AssociationField::new('category'),
            TextField::new('logo'),
            TextField::new('cover')->hideOnIndex(),
            TextField::new('image')->hideOnIndex(),
            TextEditorField::new('description'),
        ];
    }

}
