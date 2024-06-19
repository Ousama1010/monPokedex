<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $damage
 * @property string $description
 * @property string $img_path
 * @property int $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Type $type
 * @method static \Database\Factories\AttackFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Attack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attack query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attack whereUpdatedAt($value)
 */
	class Attack extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $hp
 * @property float $weight
 * @property float $height
 * @property string $img_path
 * @property int $primary_type_id
 * @property int|null $secondary_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Type $primaryType
 * @property-read \App\Models\Type|null $secondaryType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Type> $types
 * @property-read int|null $types_count
 * @method static \Database\Factories\PokemonFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon wherePrimaryTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereSecondaryTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereWeight($value)
 */
	class Pokemon extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $color
 * @property string $img_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attack> $attacks
 * @property-read int|null $attacks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pokemon> $pokemons
 * @property-read int|null $pokemons_count
 * @method static \Database\Factories\TypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 */
	class Type extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

