<?php

namespace App\Forms;

use App\Brand;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class TruckForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('brand_id', Field::SELECT, [
                'label' => 'Auto brand',
                'rules' => 'required',
                'choices' => [Brand::pluck('name', 'id')],
                'empty_value' => '=== Select brand ==='
            ])
            ->add('year_of_manufacture', Field::NUMBER, [
                'label' => 'Year of Manufacture',
                'rules' => 'required|min:1900'
            ])
            ->add('owner_s_name_and_surname', Field::TEXT, [
                'label' => 'Owner‘s Name and Surname',
                'rules' => 'required'
            ])
            ->add('number_of_owners', Field::TEXT, [
                'label' => 'Number of owners',
            ])
            ->add('comments', 'textarea')
            ->add('submit', 'submit');
    }
}
