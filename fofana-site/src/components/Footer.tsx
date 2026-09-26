import { ExternalLink, Mail, MapPin, Phone } from "lucide-react";
import Link from "next/link";

export default function Footer() {
  return (
    <footer className="bg-deep-forest text-white mt-section-gap">
      {/* Top accent */}
      <div className="tricolour-rule">
        <div className="rule-red" />
        <div className="rule-gold" />
        <div className="rule-green" />
      </div>

      <div className="max-w-[1280px] mx-auto px-margin-page py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
          {/* Brand */}
          <div className="flex flex-col gap-4">
            <h3 className="font-heading text-[24px] font-bold">Ouzby Fofana</h3>
            <p className="text-white/70 text-[14px] leading-relaxed">
              Député de la République de Guinée.
              <br />
              Président du RGA depuis 2010.
            </p>
            <p className="text-secondary-container text-[13px] italic font-heading">
              &ldquo;Servir le peuple, construire la nation&rdquo;
            </p>
          </div>

          {/* Navigation */}
          <div className="flex flex-col gap-3">
            <h4 className="text-[12px] font-bold uppercase tracking-[0.05em] text-white/50 mb-2">
              Navigation
            </h4>
            {[
              { href: "/", label: "Accueil" },
              { href: "/parcours", label: "Parcours" },
              { href: "/mandat", label: "Mandat" },
              { href: "/vision", label: "Vision" },
              { href: "/actualites", label: "Actualités" },
              { href: "/galerie", label: "Galerie" },
            ].map((link) => (
              <Link
                key={link.href}
                href={link.href}
                className="text-white/70 hover:text-secondary-container transition-colors text-[14px]"
              >
                {link.label}
              </Link>
            ))}
          </div>

          {/* Ressources */}
          <div className="flex flex-col gap-3">
            <h4 className="text-[12px] font-bold uppercase tracking-[0.05em] text-white/50 mb-2">
              Ressources
            </h4>
            {[
              { href: "/agenda", label: "Agenda" },
              { href: "/espace-presse", label: "Espace Presse" },
              { href: "/contact", label: "Contact" },
            ].map((link) => (
              <Link
                key={link.href}
                href={link.href}
                className="text-white/70 hover:text-secondary-container transition-colors text-[14px]"
              >
                {link.label}
              </Link>
            ))}
            <a
              href="https://rga-guinee.org"
              target="_blank"
              rel="noopener noreferrer"
              className="text-white/70 hover:text-secondary-container transition-colors text-[14px] flex items-center gap-1"
            >
              RGA Guinée <ExternalLink size={12} />
            </a>
          </div>

          {/* Contact */}
          <div className="flex flex-col gap-3">
            <h4 className="text-[12px] font-bold uppercase tracking-[0.05em] text-white/50 mb-2">
              Contact
            </h4>
            <div className="flex items-start gap-2 text-white/70 text-[14px]">
              <MapPin
                size={16}
                className="mt-0.5 shrink-0 text-secondary-container"
              />
              <span>Kaloum, Conakry, Guinée</span>
            </div>
            <div className="flex items-center gap-2 text-white/70 text-[14px]">
              <Phone size={16} className="shrink-0 text-secondary-container" />
              <span>+224 627 249 666</span>
            </div>
            <div className="flex items-center gap-2 text-white/70 text-[14px]">
              <Mail size={16} className="shrink-0 text-secondary-container" />
              <span>contact@rga-guinee.org</span>
            </div>
          </div>
        </div>

        {/* Bottom bar */}
        <div className="mt-12 pt-6 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
          <p className="text-white/40 text-[12px]">
            &copy; {new Date().getFullYear()} Ansoumane Fofana. Tous droits
            réservés.
          </p>
          <p className="text-white/40 text-[12px]">Vérité · Loyauté · Paix</p>
        </div>
      </div>
    </footer>
  );
}
