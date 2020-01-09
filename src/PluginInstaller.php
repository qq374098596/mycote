<?php
namespace qq374098596\mycote;
use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
class PluginInstaller extends LibraryInstaller
{
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);
        $this->filesystem->copy($this->getInstallPath($package) . DIRECTORY_SEPARATOR . 'application/', '/');
    }

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    // public function getPackageBasePath(PackageInterface $package)
    {
        // $package->getPrettyName() 包的名字
        // $prefix = substr($package->getPrettyName(), 0, 23);
        $prefix = $package->getPrettyName();
        
        if ('topthink/think' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, phpdocumentor templates '
                .'should always start their package name with '
                .'"phpdocumentor/template-"'
            );
        }
       // 返回指定路径
        return 'think';
        // return './think/'.substr($package->getPrettyName(), 23);
        // return './think/' . $package->getPrettyName();
    }
    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
       
        return 'project' === $packageType;
    }
}
?>