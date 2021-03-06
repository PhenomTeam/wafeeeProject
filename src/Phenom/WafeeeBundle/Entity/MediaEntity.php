<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 7/31/15
 * Time: 6:47 PM
 */

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Expose;

/**
 * Base class for most of our entities. Livecycle callbacks should be implemented here, if possible
 * http://www.doctrine-project.org/docs/orm/2.0/en/reference/events.html#lifecycle-callbacks
 *
 * @ORM\MappedSuperclass
 */
abstract class MediaEntity extends BaseEntity
{

    public function getAbsolutePath($file = null)
    {
        return null === $file ? null : $this->getUploadRootDir() . '/' . $file;
    }

    public function getWebPath($file = null)
    {
        $dir = str_replace(DIRECTORY_SEPARATOR, '/', $this->getUploadDir());
        return null === $file ? null : '/' . $dir . '/' . $file;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return getcwd() . DIRECTORY_SEPARATOR . $this->getUploadDir();
    }

    protected function getMediaDir()
    {
        return __DIR__ . '/../../../../web';
    }

    protected function getUploadDir()
    {
        return 'mediafile' . DIRECTORY_SEPARATOR . $this->getKind() . DIRECTORY_SEPARATOR . $this->getHash();
    }

}
