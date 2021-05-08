<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class TruckForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Auto brand', Field::SELECT, [
                'rules' => 'required',
                'choices' => ['Volvo' => 'Volvo', 'VAZ' => 'VAZ', 'Mercedes' => 'Mercedes', 'GAZ' => 'GAZ'],
                'empty_value' => '=== Select one ==='
            ])
            ->add('Year of Manufacture', Field::NUMBER, [
                'rules' => 'required'
            ])
            ->add('Owner‘s Name and Surname', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('Number of owners', 'number')
            ->add('Comments', 'textarea');
    }
}
