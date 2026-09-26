"use client";

import { AnimatePresence, motion } from "framer-motion";
import { Menu, X } from "lucide-react";
import Link from "next/link";
import { usePathname } from "next/navigation";
import { useEffect, useState } from "react";

const NAV_LINKS = [
  { href: "/", label: "Accueil" },
  { href: "/parcours", label: "Parcours" },
  { href: "/mandat", label: "Mandat" },
  { href: "/vision", label: "Vision" },
  { href: "/actualites", label: "Actualités" },
  { href: "/galerie", label: "Galerie" },
  { href: "/agenda", label: "Agenda" },
  { href: "/contact", label: "Contact" },
];

export default function Header() {
  const [isScrolled, setIsScrolled] = useState(false);
  const [mobileOpen, setMobileOpen] = useState(false);
  const pathname = usePathname();

  useEffect(() => {
    const onScroll = () => setIsScrolled(window.scrollY > 20);
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  useEffect(() => {
    setMobileOpen(false);
  }, [pathname]);

  return (
    <header
      className={`sticky top-0 z-50 w-full transition-all duration-300 ${
        isScrolled
          ? "bg-ivory-bg/95 backdrop-blur-md border-b border-border-elegant soft-shadow"
          : "bg-ivory-bg border-b border-border-elegant"
      }`}
    >
      {/* Tricolour Guinea accent bar */}
      <div className="tricolour-rule">
        <div className="rule-red" />
        <div className="rule-gold" />
        <div className="rule-green" />
      </div>

      <div className="flex justify-between items-center px-margin-page py-4 max-w-[1280px] mx-auto">
        {/* Brand */}
        <Link
          href="/"
          className="font-heading text-[24px] font-bold text-deep-forest leading-[32px] hover:text-primary transition-colors"
        >
          Ouzby Fofana
        </Link>

        {/* Desktop Nav */}
        <nav className="hidden lg:flex gap-6 items-center">
          {NAV_LINKS.map((link) => (
            <Link
              key={link.href}
              href={link.href}
              className={`text-[12px] font-bold uppercase tracking-[0.05em] transition-colors duration-200 pb-1 ${
                pathname === link.href
                  ? "text-primary border-b-2 border-primary"
                  : "text-on-surface-variant hover:text-primary"
              }`}
            >
              {link.label}
            </Link>
          ))}
        </nav>

        {/* CTA */}
        <Link
          href="/contact"
          className="hidden lg:inline-flex bg-primary text-surface-white text-[12px] font-bold uppercase tracking-[0.05em] py-2.5 px-6 rounded-sm hover:bg-primary-container transition-colors"
        >
          Rejoindre
        </Link>

        {/* Mobile toggle */}
        <button
          onClick={() => setMobileOpen(!mobileOpen)}
          className="lg:hidden text-deep-forest p-2"
          aria-label="Menu"
        >
          {mobileOpen ? <X size={24} /> : <Menu size={24} />}
        </button>
      </div>

      {/* Mobile Drawer */}
      <AnimatePresence>
        {mobileOpen && (
          <motion.div
            initial={{ opacity: 0, height: 0 }}
            animate={{ opacity: 1, height: "auto" }}
            exit={{ opacity: 0, height: 0 }}
            transition={{ duration: 0.3 }}
            className="lg:hidden overflow-hidden bg-ivory-bg border-t border-border-elegant"
          >
            <nav className="flex flex-col px-margin-page py-4 gap-1">
              {NAV_LINKS.map((link, i) => (
                <motion.div
                  key={link.href}
                  initial={{ x: -20, opacity: 0 }}
                  animate={{ x: 0, opacity: 1 }}
                  transition={{ delay: i * 0.05 }}
                >
                  <Link
                    href={link.href}
                    className={`block py-3 px-4 rounded-md text-[14px] font-medium transition-colors ${
                      pathname === link.href
                        ? "bg-primary-container/10 text-primary font-bold"
                        : "text-on-surface-variant hover:bg-surface-container hover:text-primary"
                    }`}
                  >
                    {link.label}
                  </Link>
                </motion.div>
              ))}
              <Link
                href="/contact"
                className="mt-3 bg-primary text-surface-white text-center py-3 px-6 rounded-sm font-bold text-[12px] uppercase tracking-[0.05em] hover:bg-primary-container transition-colors"
              >
                Rejoindre
              </Link>
            </nav>
          </motion.div>
        )}
      </AnimatePresence>
    </header>
  );
}
