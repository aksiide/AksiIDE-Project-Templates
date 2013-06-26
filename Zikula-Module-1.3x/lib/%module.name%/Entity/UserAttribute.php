<?php
%header%

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="BMKGIklim_user_attribute",
 *            uniqueConstraints={@ORM\UniqueConstraint(name="cat_unq",columns={"name", "entityId"})})
 */
class %module.name%_Entity_UserAttribute extends Zikula_Doctrine2_Entity_EntityAttribute
{
	/**
	 * @ORM\ManyToOne(targetEntity="%module.name%_Entity_User", inversedBy="attributes")
	 * @ORM\JoinColumn(name="entityId", referencedColumnName="id")
	 * @var BMKGIklim_Entity_User
	 */
	private $entity;

	public function getEntity()
	{
			return $this->entity;
	}

	public function setEntity($entity)
	{
			$this->entity = $entity;
	}
}
