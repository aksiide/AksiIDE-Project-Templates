<?php
%header%

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="BMKGIklim_user_category",
 *            uniqueConstraints={@ORM\UniqueConstraint(name="cat_unq",columns={"registryId", "categoryId", "entityId"})})
 */
class %module.name%_Entity_UserCategory extends Zikula_Doctrine2_Entity_EntityCategory
{
	/**
	 * @ORM\ManyToOne(targetEntity="%module.name%_Entity_User", inversedBy="categories")
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
