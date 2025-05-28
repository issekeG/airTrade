<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[Vich\Uploadable]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 350)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'article_image', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): static
    {
        $this->imageFile = $imageFile;
        return $this;
    }

    #[ORM\Column(length: 255)]
    private ?string $writtenBy = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 350)]
    private ?string $slug = null;

    #[ORM\Column(length: 400)]
    private ?string $seoTitle = null;

    #[ORM\Column(length: 400)]
    private ?string $seoKeywords = null;

    #[ORM\Column(length: 500)]
    private ?string $seoDescription = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?ArticleCategory $category = null;



    /**
     * @var Collection<int, ArticleSection>
     */
    #[ORM\OneToMany(targetEntity: ArticleSection::class, mappedBy: 'article', cascade: ['persist','remove','refresh'])]
    private Collection $articleSections;

    /**
     * @var Collection<int, ArticleTag>
     */
    #[ORM\OneToMany(targetEntity: ArticleTag::class, mappedBy: 'article')]
    private Collection $articleTags;

    #[ORM\Column]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $langue = null;

    public function __construct()
    {
        $this->articleSections = new ArrayCollection();
        $this->articleTags = new ArrayCollection();
        $this->publishedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getWrittenBy(): ?string
    {
        return $this->writtenBy;
    }

    public function setWrittenBy(string $writtenBy): static
    {
        $this->writtenBy = $writtenBy;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSeoTitle(): ?string
    {
        return $this->seoTitle;
    }

    public function setSeoTitle(string $seoTitle): static
    {
        $this->seoTitle = $seoTitle;

        return $this;
    }

    public function getSeoKeywords(): ?string
    {
        return $this->seoKeywords;
    }

    public function setSeoKeywords(string $seoKeywords): static
    {
        $this->seoKeywords = $seoKeywords;

        return $this;
    }

    public function getSeoDescription(): ?string
    {
        return $this->seoDescription;
    }

    public function setSeoDescription(string $seoDescription): static
    {
        $this->seoDescription = $seoDescription;

        return $this;
    }

    public function getCategory(): ?ArticleCategory
    {
        return $this->category;
    }

    public function setCategory(?ArticleCategory $category): static
    {
        $this->category = $category;

        return $this;
    }


    /**
     * @return Collection<int, ArticleSection>
     */
    public function getArticleSections(): Collection
    {
        return $this->articleSections;
    }

    public function addArticleSection(ArticleSection $articleSection): static
    {
        if (!$this->articleSections->contains($articleSection)) {
            $this->articleSections->add($articleSection);
            $articleSection->setArticle($this);
        }

        return $this;
    }

    public function removeArticleSection(ArticleSection $articleSection): static
    {
        if ($this->articleSections->removeElement($articleSection)) {
            // set the owning side to null (unless already changed)
            if ($articleSection->getArticle() === $this) {
                $articleSection->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ArticleTag>
     */
    public function getArticleTags(): Collection
    {
        return $this->articleTags;
    }

    public function addArticleTag(ArticleTag $articleTag): static
    {
        if (!$this->articleTags->contains($articleTag)) {
            $this->articleTags->add($articleTag);
            $articleTag->setArticle($this);
        }

        return $this;
    }

    public function removeArticleTag(ArticleTag $articleTag): static
    {
        if ($this->articleTags->removeElement($articleTag)) {
            // set the owning side to null (unless already changed)
            if ($articleTag->getArticle() === $this) {
                $articleTag->setArticle(null);
            }
        }

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }
    public function generateSlug(): string
    {
            $slugify = new Slugify();
            $slug = $slugify->slugify($this->getTitle());
            $dateTime = new \DateTimeImmutable();
            $formattedDate = $dateTime->format('Y-m-d_H-i-s');

            return $slug . '-' . $formattedDate;

    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): static
    {
        $this->langue = $langue;

        return $this;
    }
}
