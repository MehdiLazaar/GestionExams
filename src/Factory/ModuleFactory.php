<?php

namespace App\Factory;

use App\Entity\Module;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Module>
 */
final class ModuleFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Module::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'enseignant' => EnseignantFactory::new()->randomOrCreate(), // TODO add App\Entity\enseignant type manually
            'filiere' => FiliereFactory::new()->randomOrCreate(), // TODO add App\Entity\filiere type manually
            'nom' => self::faker()->realText(40),
            'semestre' => SemestreFactory::new()->randomOrCreate(), // TODO add App\Entity\semestre type manually
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Module $module): void {})
        ;
    }
}
