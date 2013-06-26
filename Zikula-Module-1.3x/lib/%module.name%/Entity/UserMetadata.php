<?php
%header%
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="BMKGIklim_user_metadata")
 */
class %module.name%_Entity_UserMetadata extends Zikula_Doctrine2_Entity_EntityMetadata
{
	/**
	 * @ORM\OneToOne(targetEntity="%module.name%_Entity_User", inversedBy="metadata")
	 * @ORM\JoinColumn(name="entityId", referencedColumnName="id", unique=true)
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
