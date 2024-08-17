<?php

namespace App\Form;

use App\Entity\Registro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Vich\UploaderBundle\Form\Type\VichFileType;


class RegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('paterno')
            ->add('materno')
            ->add('sexo', ChoiceType::class, [
                'choices'  => [
                    'Femenino' => 'Femenino',
                    'Masculino' => 'Masculino',
                ],
                'placeholder' => 'Seleccionar',
                'required'=>false,
            ])
            ->add('mail', RepeatedType::class, [
               'invalid_message' => 'Los correos no son iguales',
               'first_options'  => ['label' => 'Correo'],
               'second_options' => ['label' => 'Confirma correo']])
            ->add('procedencia')
            ->add('status',ChoiceType::class, [
                'choices'  => [
                    'Estudiante de licenciatura'=>'Estudiante de licenciatura',
                    'Estudiante de posgrado'=>'Estudiante de posgrado',
                    'Investigador'=>'Investigador',
                    'Posdoctorante'=>'Posdoctorante',
                    'Otro'=>'Otro'
                ],
                'placeholder' => 'Seleccionar',
            ])
            ->add('titulo', TextType::class,array(
                'required' => false
            ))
            ->add('contribucion',ChoiceType::class, [
                'required'=>false,
                'choices'  => [
                    'Plática'=>'Plática',
                    'Cartel'=>'Cartel',
                ],
                'placeholder' => 'Seleccionar',
            ])
            ->add('profesor', TextType::class,array(
                'required' => false
            ))
            ->add('univprofesor',TextType::class,array(
                'required' => false
            ))
            ->add('mailprofesor', RepeatedType::class, [
                'invalid_message' => 'Los correos no son iguales',
                'required'=>false,
                'first_options'  => ['label' => 'Correo'],
                'second_options' => ['label' => 'Confirma correo']])
            ->add('confirmado')
            ->add('restricciones', null,[
                'required' => false,
                'label'=>'Indicaciones'])
            ->add('beca',ChoiceType::class, [
                'choices'  => [
                    'Sin apoyo' => 'Sin apoyo',
                    'Solamente hospedaje' => 'Solamente hospedaje',
                    'Hospedaje y transporte terrestre' => 'Hospedaje y transporte terrestre',
                ],
                'placeholder' => 'Seleccionar',
            ])
            ->add('aceptado')
            ->add('resumen', TextareaType::class,array(
                'label'=>'Razones por las que desa asistir',
                'required'=>false,
            ))
            ->add('comentarios', TextareaType::class,array(
                'required' => false,
                'label'=>'Comentarios'))
            ->add('infoadicional', TextareaType::class,array(
                'required' => false,
                'label'=>'Información adicional'))
            ->add('recomendacion', TextareaType::class,array(
                'required' => false,
                ))
            ->add('cartaFile', VichFileType::class, [
                'required' => false,
                'label'=>'Carta de recomendación'
            ])
            ->add('otroestatus', null, [
                'label' => 'Otro Estatus',
                'mapped'=> false,
                // Otros opciones según tus necesidades
            ])
            ->add('credencialFile', VichFileType::class, [
                'required' => false,
                'label'=>'Credencial'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Registro::class,

        ]);
    }
}
